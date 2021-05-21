<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;

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
    public function store(Request $request)
    {
        $params = $request->all();
        $params['slug'] = Str::slug($params['name']);

        $category = $this->categoryRepo->create($params);

        if (blank($category)) {
            Session::flash('error', __('message.error', ['action' => __('common.store'), 'model' => __('common.category')]));
        } else {
            Session::flash('success', __('message.success', ['action' => __('common.store'), 'model' => __('common.category')]));
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
    public function update(Request $request, $id)
    {
        $params = $request->all();
        unset($params['_token'], $params['_method']);
        $params['slug'] = Str::slug($params['name']);

        $updation = $this->categoryRepo->update($id, $params);

        if (!$updation) {
            Session::flash('error', __('message.error', ['action' => __('common.update'), 'model' => __('common.category')]));
        } else {
            Session::flash('success', __('message.success', ['action' => __('common.update'), 'model' => __('common.category')]));
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
        $this->categoryRepo->clear($id);

        return back();
    }
}
