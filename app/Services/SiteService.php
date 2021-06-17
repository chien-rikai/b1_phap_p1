<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use Session;

class SiteService
{
    protected $productRepo;
    protected $cateRepo;

    public function __construct(ProductRepository $productRepo,
                                CategoryRepository $cateRepo)
    {
        $this->productRepo = $productRepo;
        $this->cateRepo = $cateRepo;
    }

    public function rating(Request $request)
    {
        if ($request->has(['count_rating', 'star_rating', 'star', 'score_rating'])) {
            $params = $request->all([
                'count_rating', 'star_rating', 'star', 'score_rating'
            ]);

            $params['count_rating'] += 1;
            $params['star_rating'] = ($params['score_rating'] + $params['star']) / ($params['count_rating']);
    
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
}