<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends AbstractRepository
{

    public function getModel()
    {
        return \App\Models\Category::class;
    }

    public function search($params)
    {
        $data = $this->model->select(['id', 'name']);

        if (isset($params['name']))
        {
            $data->whereName($params['name']);
        }

        return $data->orderBy('id','DESC')
                    ->paginate(parent::LIMIT);
    }

    public function clear($id)
    {
        $data = $this->model->find($id);

        if (blank($data)) {
            Session::flash('error', __('message.not_found'));
        }

        DB::beginTransaction();
        try {
            $data->products()->delete();
            $data->delete();

            DB::commit();
            Session::flash('success', __('message.success', ['action' => __('common.destroy'), 'model' => __('common.category')]));
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error', __('message.error', ['action' => __('common.destroy'), 'model' => __('common.category')]));
        }

    }
}
