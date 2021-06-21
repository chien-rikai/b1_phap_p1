<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Services\SiteService;
use App\Models\Product;
use Session;

class SiteController extends Controller
{
    protected $productRepo;
    protected $siteService;


    public function __construct(ProductRepository $productRepo,
                                SiteService $siteService)
    {
        $this->productRepo = $productRepo;
        $this->siteService = $siteService;
    }

    public function home()
    {
        return view('site.home')->with([
            'products' => $this->productRepo->getListDESC(6),
            'hotProducts' => $this->productRepo->getHotProducts(),
            'saleProducts' => $this->productRepo->getSaleProducts()
        ]);
    }
    /**
     * 'slugCate': slug of category
     * 'slug': slug of product
     * Nếu tồn tại slug thì sẽ truy vấn tìm product -> return page product's detail
     * Còn không thì sẽ truy vấn tìm các products tương ứng với slugCate của category -> return page category's products
     */
    public function detail($slugCate, $slug = null)
    {
        if (is_null($slug)) {
            return view('site.detail-category')->with([
                'products' => $this->productRepo->getListProductsBySlugCate($slugCate, 9),
            ]);
        }

        $product = $this->productRepo->getProductBySlug($slug);
        $this->productRepo->incrementView($product->id);

        return view('site.detail-product')->with([
            'product' => $product,
            'products' => $this->productRepo->getListProductsBySlugCate($slugCate)
        ]);
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

    public function payment(Request $request)
    {

    }
}
