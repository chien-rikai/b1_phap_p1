<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;

class CategoryService
{
    public $categoryRepo;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }

    public function store(Request $request)
    {
        $category = $this->categoryRepo->create([
            'name' => $request->name, 
            'slug' => Str::slug($request->name)
        ]);

        if (blank($category)) {
            Session::flash('error', __('message.error', ['action' => __('common.store'), 'model' => __('common.category')]));
        } else {
            Session::flash('success', __('message.success', ['action' => __('common.store'), 'model' => __('common.category')]));
        }
    }

    public function update(Request $request, $id)
    {
        $updation = $this->categoryRepo->update($id, [
            'name' => $request->name, 
            'slug' => Str::slug($request->name)
        ]);

        if (!$updation) {
            Session::flash('error', __('message.error', ['action' => __('common.update'), 'model' => __('common.category')]));
        } else {
            Session::flash('success', __('message.success', ['action' => __('common.update'), 'model' => __('common.category')]));
        }
    }
}