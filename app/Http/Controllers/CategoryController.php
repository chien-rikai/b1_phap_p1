<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Category\ValidateCreation as CategoryCreate;
use App\Http\Requests\Category\ValidateUpdation as CategoryUpdate;
use Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();

        $categories = $this->categoryRepo->search($params);

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
        $params = $request->all();
        $params['slug'] = Str::slug($params['name']);

        $category = $this->categoryRepo->create($params);

        if (blank($category)) {
            Session::flash('error', 'Thêm mới thành công');
        } else {
            Sesssion::flash('success', 'Thêm mới thất bại');
        }

        return back();
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
    public function edit($id)
    {
        $category = $this->categoryRepo->getById($id);

        if (blank($category)) {
            Session::flash('error', 'Không tìm thấy dữ liệu !');
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
        $params = $request->all();
        unset($params['_token'], $params['_method']);
        $params['slug'] = Str::slug($params['name']);

        $updation = $this->categoryRepo->update($id, $params);

        if (!$updation) {
            Session::flash('error', 'Cập nhật thất bại !');
        } else {
            Session::flash('success', 'Cập nhật thành công !');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepo->getById($id);

        if (blank($category)) {
            Session::flash('error', 'Không tìm thấy dữ liệu !');
            return back();
        }

        $deletion = $category->delete();

        if (!$deletion) {
            Session::flash('error', 'Xóa thất bại !');
        } else {
            Session::flash('success', 'Xóa thành công !');
        }

        return back();
    }
}
