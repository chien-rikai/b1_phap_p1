<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductStoreForm implements FromView
{
    public function view(): View
    {
        return view('admin.exports.forms.product');
    }
}
