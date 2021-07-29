<?php

namespace App\Repositories;

use DB;
use Session;
use Carbon\Carbon;
use App\Models\AnalyticRevenue;

class AnalyticRevenueRepository extends AbstractRepository
{
    public function getModel()
    {
        return \App\Models\AnalyticRevenue::class;
    }

    public function revenueEachMonth()
    {
        return $this->model->select('month', DB::raw('sum(revenue) as revenue'))
                           ->where('year', Carbon::now('Asia/Ho_Chi_Minh')->year)
                           ->groupBy('month')
                           ->pluck('revenue','month')
                           ->all();
    }
}