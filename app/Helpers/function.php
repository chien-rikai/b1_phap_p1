<?php

use App\Models\Category;
use App\Models\Product;


function loadSortSelected($params)
{
    return view('admin.helpers.selected.sort')->with([
        'title' => $params['title'] ?? '',
        'name' => $params['name'] ?? '',
        'col' => $params['col'] ?? 4
    ]);
}

function loadCategoriesSelected($params)
{
    return view('admin.helpers.selected.categories')->with([
        'required' => $params['required'] ?? false,
        'isDisabled' => $params['isDisabled'] ?? false,
        'col' => $params['col'] ?? 4,
        'category_id' =>  old('category_id') ?? $params['category_id'] ?? null,
        'categories' => $params['categories'] ?? null
    ]);
}

function loadStatusUserSelected($params)
{
    return view('admin.helpers.selected.status_user')->with([
        'title' => $params['title'] ?? '',
        'name' => $params['name'] ?? '',
        'col' => $params['col'] ?? 4
    ]);
}

function loadContentHeader($params)
{
    return view('layouts.content.header')->with([
        'home' => $params['home'],
        'action' => $params['action']
    ]);
}
function loadBreadCrumbs()
{
    return view('site.layouts.breadcrumbs');
}

function loadSuggest($params)
{
    return view('site.layouts.suggest')->with([
        'products' => $params['products'],
        'title' => $params['title'],
    ]);
}

function loadFormForCart(Product $product)
{
    return view('site.layouts.form-cart')->with([
        'product' => $product
    ]);
}

function flash_params($params)
{
    $flash = [];
    foreach ($params as $key => $value) {
        $flash[] = $key;
    }

    return $flash;
}

function getListCategories()
{
    $category = new Category;

    return $category->select()->orderBy('id', 'DESC')->get();
}

function formatCurrencyFrontEnd($str)
{
    $str = number_format($str,"0",",",".");
    return $str;
}

function formatCurrencyBackEnd($str)
{
    if (is_null($str)) {
        return 0;
    }

    $str = preg_replace("/([^0-9\\,-])/i", "", $str);
    return $str;
}

