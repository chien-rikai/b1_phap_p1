<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\MemberRepository;
use App\Http\Requests\Site\ValidatePayment;
use App\Http\Requests\Site\ValidateRegister;
use App\Http\Requests\Auth\ValidateLogin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Services\SiteService;
use App\Models\Member;
use Session;

class SiteController extends Controller
{
    protected $productRepo;
    protected $siteService;
    protected $memberRepo;

    public function __construct(ProductRepository $productRepo,
                                SiteService $siteService,
                                MemberRepository $memberRepo)
    {
        $this->productRepo = $productRepo;
        $this->siteService = $siteService;
        $this->memberRepo = $memberRepo;
    }

    public function home()
    {
        return view('site.home')->with([
            'products' => $this->productRepo->getListDESC(6),
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
            'products' => $this->productRepo->searchOnSite($request->name),
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
        if ($this->siteService->doPayment($request) != null) {
            return back();
        }

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

    public function history(Member $member)
    {
        if (blank($member)) {
            abort(404);
        }
        
        $orders = $member->orders()->orderBy('created_at', 'DESC')->paginate(10);

        return view('site.members.history', compact(['member', 'orders']));
    }

    public function order(Order $order)
    {
        if (blank($order)) {
            abort(404);
        }

        return view('site.members.order', compact('order'));
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
