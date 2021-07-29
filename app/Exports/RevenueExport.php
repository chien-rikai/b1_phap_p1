<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Repositories\AnalyticRevenueRepository;

class RevenueExport implements FromView
{
    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {   
        if ($this->type === 'today') {
            return view('admin.exports.forms.revenue_today')->with([
                'revenue' => (new AnalyticRevenueRepository)->revenueToday(), # $revenue : array()
            ]);
        }

        if ($this->type === 'month') {
            return view('admin.exports.forms.revenue_month')->with([
                'revenue' => (new AnalyticRevenueRepository)->revenueThisMonth(), # $revenue : array()
            ]);
        }

        if ($this->type === 'year') {
            return view('admin.exports.forms.revenue_year')->with([
                'revenue' => (new AnalyticRevenueRepository)->revenueEachMonth(), # $revenue : array()
            ]);
        }
    }
}
