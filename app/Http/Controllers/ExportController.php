<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Excel;
use App\Exports\ProductStoreForm;

class ExportController extends Controller
{
    public function productExcel()
    {
        return Excel::download(new ProductStoreForm, __('common.file_bieu_mau_san_pham').'.xlsx');
        return back();
    }

    public function productCSV()
    {
        return Excel::download(new ProductStoreForm, __('common.file_bieu_mau_san_pham').'.csv');
        return back();
    }
}
