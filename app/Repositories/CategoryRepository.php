<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;
use Session;

class CategoryRepository extends AbstractRepository
{

    public function getModel()
    {
        return \App\Models\Category::class;
    }

    public function search($params)
    {
        $data = $this->model->select(['id', 'name', 'display']);

        if (isset($params['name']))
        {
            $data->whereName($params['name']);
        }

        return $data->orderBy('id', 'DESC')
                    ->paginate(parent::LIMIT);
    }

    public function clear($id)
    {
        $category = $this->model->find($id);

        if (blank($category)) {
            Session::flash('error', __('message.not_found'));
            return;
        }

        DB::beginTransaction();
        try {
            $category->products->map(function ($product) use ($category) {
                $product->delete();
            });

            $category->delete();

            DB::commit();
            Session::flash('success', __('message.success', ['action' => __('common.destroy'), 'model' => __('common.category')]));
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error', __('message.error', ['action' => __('common.destroy'), 'model' => __('common.category')]));
        }

    }

    public function changeStatus($id)
    {
        
        $category = $this->model->find($id);

        if (blank($category)) {
            return 0;
        }

        DB::beginTransaction();
        try {
            $category->products->map(function ($product) use ($category) {
                $product->update(['display' => !$category->display]);
            });

            $category->update(['display' => !$category->display]);

            DB::commit();
            return 1;
        } catch (Exception $e) {
            DB::rollBack();
            return 0;
        }
    }

    public function getTrash()
    {
        return $this->model->onlyTrashed()->orderBy('deleted_at', 'DESC')
        ->paginate(parent::LIMIT);
    }

    public function restore($id)
    {
        $category = $this->model->onlyTrashed()->find($id);

        if (blank($category)) {
            Session::flash('error', __('message.not_found'));
            return;
        }
        
        DB::beginTransaction();
        try {
            $category->products()->onlyTrashed()->get()->map(function ($product) {
                return $product->restore();
            });

            $category->restore();
            DB::commit();
            
            Session::flash('success', __('message.restore'));
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error', __('message.error', ['action' => __('common.destroy'), 'model' => __('common.category')]));
        }
    }

    public function forceDestroy($id)
    {
        $category = $this->model->onlyTrashed()->find($id);

        if (blank($category)) {
            Session::flash('error', __('message.not_found'));
            return;
        }
        
        DB::beginTransaction();
        try {
            $category->products()->onlyTrashed()->get()->map(function ($product) use ($category) {
                $product->forceDelete();
            });

            $category->forceDelete();
            DB::commit();
            
            Session::flash('success', __('message.success', ['action' => __('common.destroy'), 'model' => __('common.category')]));
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error', __('message.error', ['action' => __('common.destroy'), 'model' => __('common.category')]));
        }
    }
}
