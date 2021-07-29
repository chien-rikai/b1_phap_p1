<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\Category\ValidateCreation as CategoryCreate;
use App\Http\Requests\Category\ValidateUpdation as CategoryUpdate;
use Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = $this->categoryService->categoryRepo->search($request->all());

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreate $request)
    {
        $this->categoryService->store($request);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (blank($category)) {
            Session::flash('error', __('message.not_found'));
            return back();
        }

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdate $request, $id)
    {
       $this->categoryService->update($request, $id);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryService->categoryRepo->clear($id);

        return back();
    }

    public function changeStatus($id)
    {
        return $this->categoryService->categoryRepo->changeStatus($id);
    }

    public function trash()
    {
        return view('admin.categories.trash')->with([
            'categories' => $this->categoryService->categoryRepo->getTrash(),
        ]);
    }

    public function restore($id)
    {
        $this->categoryService->categoryRepo->restore($id);

        return redirect()->route('categories.trash'); 
    }

    public function forceDestroy($id)
    {
        $this->categoryService->categoryRepo->forceDestroy($id);
        
        return redirect()->route('categories.trash');
    }
}
