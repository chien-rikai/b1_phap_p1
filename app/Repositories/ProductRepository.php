<?php


namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends AbstractRepository
{
    public function getModel()
    {
        return Product::class;
    }

    public function search($params)
    {
        $data = $this->model->select();

        if (isset($params['name']))
        {
            $data->whereName($params['name']);
        }

        if (isset($params['category_id']))
        {
            $data->whereCategoryId($params['category_id']);
        }

        if (isset($params['sort_score_star_rating']))
        {
            $data->orderBy('score_rating', $params['sort_score_star_rating']);
        }

        if (isset($params['sort_view']))
        {
            $data->orderBy('view', $params['sort_view']);
        }
        
        if (isset($params['sort_price']))
        {
            $data->orderBy('price', $params['sort_price']);
        }

        return $data->orderBy('id','DESC')
                    ->paginate(parent::LIMIT);
    }

}
