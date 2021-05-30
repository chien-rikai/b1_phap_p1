<?php


namespace App\Repositories;

use App\Models\Product;
use Session;

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
            $data->where('name', 'LIKE', '%'.$params['name'].'%');
        }

        if (isset($params['category_id']))
        {
            $data->where('category_id', '=', $params['category_id']);
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

        return $data->orderBy('id', 'DESC')
                    ->paginate(parent::LIMIT);
    }

    public function searchOnSite($name)
    {
        return $this->model->where('name', 'LIKE', '%'.$name.'%')->display()->paginate(9);
    }

    public function getListProductsBySlugCate($slug, $param)
    {
        $data = $this->model->select();

        switch ($param) {
            case 'price-asc':
                $data->orderBy('price', 'ASC');
                break;
            
            case 'price-desc':
                $data->orderBy('price', 'DESC');
                break;

            case 'title-asc':
                $data->orderBy('name', 'ASC');
                break;
            
            case 'title-desc':
                $data->orderBy('name', 'DESC');
                break;

            case 'created-asc':
                $data->orderBy('created_at', 'ASC');
                break;

            case 'created-desc':
                $data->orderBy('created_at', 'DESC');
                break;

            case 'best-view':
                $data->orderBy('view', 'DESC');
                break;

            case 'best-rating':
                $data->orderBy('score_rating', 'DESC');
                break;

            default:
                break;
        }

        $data->whereHas('category', function ($query) use ($slug) {
            $query->whereSlug($slug);
        });

        return $data->display()->paginate(9);
    }

    public function getProductsSameCategory($cateId)
    {
        return $this->model->select()->whereHas('category', function ($query) use ($cateId) {
            $query->whereId($cateId);
        })->display()->paginate(4);
    }

    public function getProductBySlug($slug)
    {
        return $this->model->firstWhere([
            ['slug', $slug],
            ['display', true]
        ]);
    }

    public function incrementView($id)
    {
        return $this->model->whereId($id)->increment('view');
    }

    public function rating($params)
    {   
        $this->model->whereId($params['id'])->update([
            'count_rating' => $params['count_rating'],
            'score_rating' => $params['score_rating'],
            'star_rating' => $params['star_rating']
        ]);

        return $params['star_rating'];
    }

    public function getHotProducts()
    {
        return $this->model->display('view')->limit(4)->get();
    }

    public function getSaleProducts()
    {
        return $this->model->where('price_promotion', '<>', 0)->display()->limit(4)->get();
    }

    public function getTrash()
    {
        return $this->model->onlyTrashed()->orderBy('deleted_at', 'DESC')
        ->paginate(parent::LIMIT);
    }

    public function restore($id)
    {
        $product = $this->model->onlyTrashed()->find($id);

        if (blank($product)) {
            Session::flash('error', __('message.not_found'));
            return;
        }
        
        if ($product->restore()) {
            Session::flash('success', __('message.restore'));
        } else {
            Session::flash('error', __('message.error', ['action' => __('common.destroy'), 'model' => __('common.product')]));
        }

        return;
    }

    public function forceDestroy($id)
    {
        $product = $this->model->onlyTrashed()->find($id);

        if (blank($product)) {
            Session::flash('error', __('message.not_found'));
            return;
        }
        
        if ($product->forceDelete()) {
            Session::flash('success', __('message.success', ['action' => __('common.destroy'), 'model' => __('common.product')]));
        } else {
            Session::flash('error', __('message.error', ['action' => __('common.destroy'), 'model' => __('common.product')]));
        }

        return;
    }

    public function getNewProduct($limit = self::LIMIT)
    {
        return $this->model->display()->orderBy('id', 'DESC')->limit($limit)->get();
    }
}
