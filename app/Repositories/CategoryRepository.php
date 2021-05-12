<?php

namespace App\Repositories;


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

}
