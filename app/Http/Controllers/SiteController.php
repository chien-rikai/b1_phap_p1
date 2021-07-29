<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\MemberRepository;
use App\Repositories\OrderRepository;
use App\Http\Requests\Site\ValidatePayment;
use App\Http\Requests\Site\ValidateRegister;
use App\Http\Requests\Auth\ValidateLogin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Services\SiteService;
use App\Models\Member;
use App\Models\Order;
use Session;

class SiteController extends Controller
{
    protected $productRepo;
    protected $siteService;
    protected $memberRepo;
    protected $orderRepo;

    public function __construct(ProductRepository $productRepo,
                                SiteService $siteService,
                                MemberRepository $memberRepo,
                                OrderRepository $orderRepo)
    {
        $this->productRepo = $productRepo;
        $this->siteService = $siteService;
        $this->memberRepo = $memberRepo;
        $this->orderRepo = $orderRepo;
    }

    public function home()
    {
        return view('site.home')->with([
            'products' => $this->productRepo->getNewProduct(6),
            'hotProducts' => $this->productRepo->getHotProducts(),
            'saleProducts' => $this->productRepo->getSaleProducts()
        ]);
    }

    public function search(Request $request)
    {
        if (!$request->has('name')) {
            return redirect()->route('site.home');
        }

        return view('site.search')->with([
            'products' => $this->siteService->search($request->name),
        ]);
    }

    public function collection($slug, Request $request) 
    {
        return view('site.detail-category')->with([
            'products' => $this->productRepo->getListProductsBySlugCate($slug, $request->order),
        ]);
    }

    public function product($slug)
    {
        return view('site.detail-product')->with(
            $this->siteService->product($slug)
        );
    }

    public function rating(Request $request)
    {
        return $this->siteService->rating($request);
    }

    public function addToCart(Request $request)
    {   
        return $this->siteService->addCart($request);
    }

    public function updateCart(Request $request)
    {
        return $this->siteService->updateCart($request);
    }

    public function removeOutCart($id)
    {
        Session::forget('cart.'.$id);
        return 1;
    }
    /**
     * @return $products : array
     */
    public function cart()
    {
        return view('site.cart')->with([
            'products' => Session::get('cart') ?? [],
            'total' => 0
        ]);
    }

    public function payment()
    {
        return view('site.payment');
    }

    public function doPayment(ValidatePayment $request)
    {
        // Lưu thông tin người mua vào Session('customer')
        $this->siteService->doPayment($request);

        return redirect()->route('confirm.payment');
    }

    public function confirmPayment()
    {
        return view('site.confirm-payment')->with([
            'customer' => Session::get('customer'),
            'products' => Session::get('cart'),
            'total' => 0
        ]);
    }

    public function confirm()
    {
        $this->siteService->confirm();

        return redirect()->route('site.payment.success');
    }

    public function paymentSuccess()
    {
        return view('site.payment-success'); 
    }

    public function register()
    {
        return view('site.register');
    }

    public function postRegister(ValidateRegister $request)
    {
        $params = $request->all();
        $params['password'] = Hash::make($params['password']);
        
        $member = $this->memberRepo->create($params);

        if (blank($member)) {
            dd('Fault');
        }

        return view('site.register-success');
    }

    public function login()
    {
        return view('site.login');
    }

    public function postLogin(ValidateLogin $request)
    {
        $request->flashOnly(['email']);
        $auth = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('site')->attempt($auth)) {   
            return redirect()->route('site.home');
        }

        return redirect()->back()->with('error_login', __('message.error_login'));
    }

    public function logout()
    {
        Auth::guard('site')->logout();
        return redirect()->route('site.login');
    }

    public function history(Member $member, Request $request)
    {
        if (blank($member)) {
            Session::flash('error', __('message.not_found'));
            return redirect()->route('members.index');
        }

        $request->flashOnly(flash_params($request->all()));
        
        return view('site.members.history')->with([
            'orders' => $this->orderRepo->searchForMember($member->id, $request->all()),
            'member' => $member,
        ]);
    }

    public function order(Order $order)
    {
        return view('site.members.order')->with([
            'order' => $order,
            'detailOrders' => $order->detail_orders()->get(),
            'totalPayment' => 0
        ]);
    }

    public function profile(Member $member)
    {
        if (blank($member)) {
            abort(404);
        }

        return view('site.members.profile', compact('member'));
    }

    public function updateProfile(ValidateUpdateProfile $request, Member $member)
    {
        $params = [
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ];

        if (!$member->update($params)) {
            Session::flash('error', __('message.error', ['action' => __('common.update'), 'model' => __('common.user')]));
        } else {
            Session::flash('success', __('message.success', ['action' => __('common.update'), 'model' => __('common.user')]));
        }

        return back();
    }
}
