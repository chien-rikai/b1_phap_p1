<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Traits\ImageResize;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Str;
use App\Models\Product;
use Session;
use File;

class ProductService 
{
    use ImageResize;

    public $productRepo;
    public $categoryRepo;
    
    public function __construct(ProductRepository $productRepo,
                                CategoryRepository $categoryRepo)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
    }

    public function getCategories()
    {
        return $this->categoryRepo->getLists();
    }

    private function upload($image, $filename)
    {
        try {
            $this->uploadImage($image, $filename, 'projects/avatar', [
                'sizeX' => 100, 
                'sizeY' => 100, 
                'status' => 1, 
                'quality' => 100
            ]);
            $this->uploadImage($image, $filename, 'projects/display', [
                'sizeX' => 150, 
                'sizeY' => 150, 
                'status' => 1, 
                'quality' => 100
            ]);
            $this->uploadImage($image, $filename, 'projects/detail', [
                'sizeX' => 300, 
                'sizeY' => 300, 
                'status' => 1, 
                'quality' => 100
            ]);
    
            return null;
        } catch (Exception $e) {
            return $e;
        } 
    }

    public function index(Request $request)
    {
        
        $request->flashOnly($request->all());

        return $this->productRepo->search($request->all());
    }

    public function store(Request $request)
    {
        $params = [
            'name' => $request->name,
            'slug' => Str::slug($request->name).time(),
            'url_image' => $request->file('url_image'),
            'description' => $request->description,
            'price' => formatCurrencyBackEnd($request->price),
            'price_promotion' => formatCurrencyBackEnd($request->price_promotion),
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ];

        $filename = $params['slug'] . time() . '.' . $request->url_image->getClientOriginalExtension();
        
        if (is_null(self::upload($request->url_image, $filename))) {
            $params['url_image'] = $filename;
        }

        $product = $this->productRepo->create($params);

        if (blank($product)) {
            Session::flash('error', __('message.error', ['action' => __('common.store'), 'model' => __('common.product')]));
        } else {
            Session::flash('success', __('message.success', ['action' => __('common.store'), 'model' => __('common.product')]));
        }

        return;
    }

    public function update(Request $request, Product $product)
    {
        $params = [
            'name' => $request->name,
            'slug' => Str::slug($request->name).time(),
            'description' => $request->description,
            'price' => formatCurrencyBackEnd($request->price),
            'price_promotion' => formatCurrencyBackEnd($request->price_promotion),
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ];

        $request->whenHas('url_image', function ($image) use (&$params, $product) {
            $filename = $params['slug'] . time() . '.' . $image->getClientOriginalExtension();

            if (is_null(self::upload($image, $filename))) {
                $delImage = [
                    storage_path('app/public/projects/avatar/' . $product->url_image),
                    storage_path('app/public/projects/display/' . $product->url_image),
                    storage_path('app/public/projects/detail/' . $product->url_image),
                ];
    
                File::delete($delImage);
                $params['url_image'] = $filename;
            }

            return;
        });

        $updation = $product->update($params);

        if (!$updation) {
            Session::flash('error', __('message.error', ['action' => __('common.update'), 'model' => __('common.product')]));
        } else {
            Session::flash('success', __('message.success', ['action' => __('common.update'), 'model' => __('common.product')]));
        }

        return;
    }

    public function destroy(Product $product)
    {
        $delImage = [
            storage_path('app/public/projects/avatar/' . $product->url_image),
            storage_path('app/public/projects/display/' . $product->url_image),
            storage_path('app/public/projects/detail/' . $product->url_image),
        ];

        File::delete($delImage);

        $deletion = $product->delete();

        if (!$deletion) {
            Session::flash('error', __('message.error', ['action' => __('common.destroy'), 'model' => __('common.product')]));
        } else {
            Session::flash('success', __('message.success', ['action' => __('common.destroy'), 'model' => __('common.product')]));
        }

        return;
    }

    public function changeStatus(Product $product)
    {
        if (blank($product)) {
            return 0;
        }

        return $product->update(['display' => !$product->display]);
    }
}