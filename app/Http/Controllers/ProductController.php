<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use Illuminate\Support\Str;
use App\Repositories\CategoryRepository;
use Session, File;
use App\Http\Requests\Product\ValidateCreation as ProductCreate;
use App\Http\Requests\Product\ValidateUpdation as ProductUpdate;
use App\Repositories\ImageRepository;

class ProductController extends Controller
{
    protected $productRepo;
    protected $categoryRepo;
    protected $imageRepo;


    public function __construct(ProductRepository $productRepo,
                                CategoryRepository $categoryRepo,
                                ImageRepository $imageRepo)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
        $this->imageRepo = $imageRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $products = $this->productRepo->search($params);

        return view('admin.products.index')->with([
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepo->getLists();

        return view('admin.products.create')->with([
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreate $request)
    {
        $params = $request->all();
        $params['slug'] = Str::slug($params['name']);

        if ($request->hasFile('url_image')){
            $avatar = $request->file('url_image');

            $imageAvatar = $this->imageRepo->uploadImage($avatar, $params['slug'], 'projects/avatar', 800, 533, 1, 100);
            $imageDisplay = $this->imageRepo->uploadImage($avatar, $params['slug'], 'projects/display', 436, 595, 1, 100);
            $imageDetail = $this->imageRepo->uploadImage($avatar, $params['slug'], 'projects/detail', 436, 595, 1, 100);

            if (isset($imageAvatar) && isset($imageDisplay) && isset($imageDetail)) {
                $params['url_image'] = $imageAvatar['filename'];
            }
        }

        $product = $this->productRepo->create($params);

        if (blank($product)) {
            Session::flash('error', 'Thêm mới thất bại!');
        } else {
            Session::flash('success', 'Thêm mới thành công!');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepo->getById($id);

        if (blank($product)) {
            Session::flash('error', 'Dữ liệu không tìm thấy');
            return back();
        }

        $categories = $this->categoryRepo->getLists();

        return view('admin.products.edit')->with([
            'categories' => $categories,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdate $request, $id)
    {
        $params = $request->all();
        unset($params['_token'], $params['_method']);
        $params['slug'] = Str::slug($params['name']);

        if ($request->hasFile('url_image')){
            $avatar = $request->file('url_image');

            $imageAvatar = $this->imageRepo->uploadImage($avatar, $params['slug'], 'projects/avatar', 800, 533, 1, 100);
            $imageDisplay = $this->imageRepo->uploadImage($avatar, $params['slug'], 'projects/display', 436, 595, 1, 100);
            $imageDetail = $this->imageRepo->uploadImage($avatar, $params['slug'], 'projects/detail', 436, 595, 1, 100);

            if (isset($imageAvatar) && isset($imageDisplay) && isset($imageDetail)) {
                $product = $this->productRepo->getById($id);
                $delImage = [
                    storage_path('app/public/projects/avatar/' . $product->url_image),
                    storage_path('app/public/projects/display/' . $product->url_image),
                    storage_path('app/public/projects/detail/' . $product->url_image),
                ];

                File::delete($delImage);
                $params['url_image'] = $imageAvatar['filename'];
            }
        }

        $updation = $this->productRepo->update($id, $params);

        if (!$updation) {
            Session::flash('error', 'Thêm mới thất bại!');
        } else {
            Session::flash('success', 'Thêm mới thành công!');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productRepo->getById($id);

        if (blank($product)) {
            Session::flash('error', 'Không tìm thấy dữ liệu !');
            return back();
        }

        $delImage = [
            storage_path('app/public/projects/avatar/' . $product->url_image),
            storage_path('app/public/projects/display/' . $product->url_image),
            storage_path('app/public/projects/detail/' . $product->url_image),
        ];

        File::delete($delImage);

        $deletion = $product->delete();

        if (!$deletion) {
            Session::flash('error', 'Xóa thất bại !');
        } else {
            Session::flash('success', 'Xóa thành công !');
        }

        return back();
    }
}
