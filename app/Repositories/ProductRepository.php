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

    public function getListProductsBySlugCate($slug, $limit = 4)
    {
        return $this->model->whereHas('category', function ($query) use ($slug) {
            $query->whereSlug($slug);
        })->orderBy('id','DESC')->paginate($limit);
    }

    public function getProductBySlug($slug)
    {
        return $this->model->whereSlug($slug)->first();
    }

    public function incrementView($id)
    {
        return $this->model->whereId($id)->increment('view');
    }

    public function rating($params)
    {
        return $this->model->whereId('id', $params['id'])->update([
            ['count_rating' => $params['count_rating']],
            ['score_rating' => $params['score_rating']],
            ['star_rating' => $params['star_rating']]
        ]);
    }

    public function getHotProducts()
    {
        return $this->model->orderBy('view', 'DESC')->limit(4)->get();
    }

    public function getSaleProducts()
    {
        return $this->model->where('price_promotion', '<>', 0)->orderBy('id', 'DESC')->limit(4)->get();
    }
}
