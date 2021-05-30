<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\OrderRepository;
use Illuminate\Support\Str;
use Session;
use App\Models\Product;

class SiteService
{
    protected $productRepo;
    protected $cateRepo;
    protected $orderRepo;

    public function __construct(ProductRepository $productRepo,
                                CategoryRepository $cateRepo,
                                OrderRepository $orderRepo)
    {
        $this->productRepo = $productRepo;
        $this->cateRepo = $cateRepo;
        $this->orderRepo = $orderRepo;
    }

    public function product($slug)
    {
        $product = $this->productRepo->getProductBySlug($slug);
        $this->productRepo->incrementView($product->id);

        return [
            'product' => $product,
            'products' => $this->productRepo->getProductsSameCategory($product->category_id)
        ];
    }

    public function rating(Request $request)
    {   
        if ($request->has(['count_rating', 'star', 'score_rating', 'id'])) {
            $params = $request->all([
                'count_rating', 'id', 'star', 'score_rating'
            ]);

            $params['count_rating'] += 1;
            $params['score_rating'] += $params['star'];
            $params['star_rating'] = round(($params['score_rating']) / ($params['count_rating']));
    
            return $this->productRepo->rating($params);
        }
   
        return 0;
    }

    public function addCart(Request $request)
    {
        if ($request->has(['id', 'name', 'slug', 'url_image', 'amount', 'price', 'price_promotion'])) {
            if (Session::has('cart.'.$request->id)) {
                Session::increment('cart.'.$request->id.'.0.amount');
            } else {
                Session::push('cart.'.$request->id, $request->all([
                    'id', 'name', 'slug', 'url_image', 'amount', 'price', 'price_promotion'
                ]));
            }
            
            return 1;
        }

        return 0;
    }

    public function updateCart(Request $request)
    {
        foreach ($request->cart as $key => $value) {
    
            if (Session::has('cart.'.$key)) {
                Session::put('cart.'.$key.'.0.amount', $value);
            }
        }

        return 1;
    }

    public function confirm()
    {
        $cart = [];
    
        foreach (Session::get('cart') as $key => $value) {
            array_push($cart, [
                'product_id' => $value[0]['id'],
                'price_base' => $value[0]['price'],
                'price_promotion' => $value[0]['price_promotion'],
                'amount' => $value[0]['amount']
            ]);
        }
        
        $this->orderRepo->payment(Session::get('customer.0'), $cart);

        return;
    }

    public function doPayment(Request $request)
    {
        if (Session::has('customer.0')) {
            foreach (Session::get('customer.0') as $key => $value) {
                Session::put('customer.0.'.$key, $request->$key);
            }
        } else {
            Session::push('customer', $request->all([
                'name', 'phone', 'email', 'address'
            ]));
        }
      
        return;
    }
    
    public function search($name)
    {
        return Product::search($name)->paginate(10);
    }
}