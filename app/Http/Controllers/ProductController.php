<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\Product\ValidateCreation as ProductCreate;
use App\Http\Requests\Product\ValidateUpdation as ProductUpdate;
use App\Http\Requests\Product\ValidateImport;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Imports\ProductImport;
use Session;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.products.index')->with([
            'products' => $this->productService->index($request),
            'categories' => $this->productService->getCategories()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create')->with([
            'categories' => $this->productService->getCategories(),
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
        $this->productService->store($request);

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
    public function edit(Product $product)
    {
        if (blank($product)) {
            Session::flash('error', __('message.not_found'));
            return back();
        }

        return view('admin.products.edit')->with([
            'categories' => $this->productService->getCategories(),
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
    public function update(ProductUpdate $request, Product $product)
    {
        $this->productService->update($request, $product);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (blank($product)) {
            Session::flash('error', __('message.not_found'));
            return back();
        }

        $this->productService->destroy($product);

        return back();
    }

    public function import(ValidateImport $request)
    {
        $file = $request->file('upload');

        $import = new ProductImport;

        try {
            $import->import($file);
        } catch (ValidationException $e) {
            Session::flash('error', __('message.error_upload', ['model' => __('common.products')]));
            return back()->withFailures($e->failures());
        }

        Session::flash('success', __('message.success_upload', ['model' => __('common.products')]));
        return back();
    }

    public function changeStatus(Product $product)
    {
        return $this->productService->changeStatus($product);
    }
}
