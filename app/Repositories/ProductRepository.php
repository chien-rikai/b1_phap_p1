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

        // if (isset($params['category_id']))
        // {
        //     $data->whereCategoryId($params['category_id']);
        // }

        // if (isset($params['star_rating']))
        // {
        //     $data->whereStarRating($params['star_rating']);
        // }

        // if (isset($params['stock_status']))
        // {
        //     switch ($params['stock_status']) {
        //         case config('constraint.STOCK_STATUS.SELL'):
        //             $data->where('stock', '>', 0);
        //             break;

        //         case config('constraint.STOCK_STATUS.SOLD'):
        //             $data->where('stock', '=', 0);
        //             break;
        //         default:
        //             # code...
        //             break;
        //     }
        // }

        return $data->orderBy('id','DESC')
                    ->paginate(parent::LIMIT);
    }
}
