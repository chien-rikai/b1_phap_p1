<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use Session;

class SiteController extends Controller
{
    protected $productRepo;
    protected $cateRepo;

    public function __construct(ProductRepository $productRepo,
                                CategoryRepository $cateRepo)
    {
        $this->productRepo = $productRepo;
        $this->cateRepo = $cateRepo;
    }
    /**
     * 'slugCate': slug of category
     * 'slug': slug of product
     */
    public function detail($slugCate, $slug = null)
    {
        if (is_null($slug)) {
            $products = $this->productRepo->getListProductsBySlugCate($slugCate, 9);
            return view('site.detail-category')->with([
                'products' => $products,
            ]);
        }

        $product = $this->productRepo->getProductBySlug($slug);
        $products = $this->productRepo->getListProductsBySlugCate($slugCate);
        $this->productRepo->incrementView($product->id);

        return view('site.detail-product')->with([
            'product' => $product,
            'products' => $products
        ]);
    }

    public function rating(Request $request)
    {
        $params = $request->all();
        $params['count_rating'] += 1;
        $params['star_rating'] = ($params['score_rating'] + $params['star']) / ($params['count_rating']);

        return $this->productRepo->rating($request->all());
    }

    public function addToCart(Request $request)
    {   
        $id = $request->input('id');

        if (Session::has('cart.'.$id)) {
            // Nếu sản phẩm đã được lưu trước đó thì amout sẽ được tăng thêm +1
            Session::increment('cart.'.$id.'.0.amount');
        } else {
            Session::push('cart.'.$id, $request->all());
        }
     
        return 1;
    }

    public function updateCart(Request $request)
    {
        $cart = $request->input('cart');
  
        foreach ($cart as $key => $value) {
    
            if (Session::has('cart.'.$key)) {
                Session::put('cart.'.$key.'.0.amount', $value);
            }
        }

        return 1;
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
        $products = Session::get('cart');
        
        return view('site.cart')->with([
            'products' => $products ?? array(),
            'total' => 0
        ]);
    }

    public function payment(Request $request)
    {

    }
}
