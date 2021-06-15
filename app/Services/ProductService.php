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

    protected $productRepo;
    protected $categoryRepo;
    
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
            'price' => $request->price,
            'price_promotion' => $request->price_promotion,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ];

        if (isset($params['url_image'])) {
            $filename = $params['slug'] . time() . '.' . $params['url_image']->getClientOriginalExtension();

            $imageAvatar = $this->uploadImage($params['url_image'], $filename, 'projects/avatar', 100, 100, 1, 100);
            $imageDisplay = $this->uploadImage($params['url_image'], $filename, 'projects/display', 150, 150, 1, 100);
            $imageDetail = $this->uploadImage($params['url_image'], $filename, 'projects/detail', 300, 300, 1, 100);
            
            if (isset($imageAvatar) && isset($imageDisplay) && isset($imageDetail)) {
                $params['url_image'] = $filename;
            }
        }

        $product = $this->productRepo->create($params);

        if (blank($product)) {
            Session::flash('error', __('message.error', ['action' => __('common.store'), 'model' => __('common.product')]));
        } else {
            Session::flash('error', __('message.success', ['action' => __('common.store'), 'model' => __('common.product')]));
        }

        return;
    }

    public function update(Request $request, Product $product)
    {
        $params = [
            'name' => $request->name,
            'slug' => Str::slug($request->name).time(),
            'url_image' => $request->file('url_image'),
            'description' => $request->description,
            'price' => $request->price,
            'price_promotion' => $request->price_promotion,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ];

        if (isset($params['url_image'])) {
            $filename = $params['slug'] . time() . '.' . $params['url_image']->getClientOriginalExtension();

            $imageAvatar = $this->uploadImage($params['url_image'], $filename, 'projects/avatar', 100, 100, 1, 100);
            $imageDisplay = $this->uploadImage($params['url_image'], $filename, 'projects/display', 150, 150, 1, 100);
            $imageDetail = $this->uploadImage($params['url_image'], $filename, 'projects/detail', 300, 300, 1, 100);
            
            if (isset($imageAvatar) && isset($imageDisplay) && isset($imageDetail)) {
                $delImage = [
                    storage_path('app/public/projects/avatar/' . $product->url_image),
                    storage_path('app/public/projects/display/' . $product->url_image),
                    storage_path('app/public/projects/detail/' . $product->url_image),
                ];

                File::delete($delImage);
                $params['url_image'] = $filename;
            }
        }

        $updation = $product->update($params);

        if (!$updation) {
            Session::flash('error', __('message.error', ['action' => __('common.update'), 'model' => __('common.product')]));
        } else {
            Session::flash('error', __('message.success', ['action' => __('common.update'), 'model' => __('common.product')]));
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
}