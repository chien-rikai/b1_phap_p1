<?php

use App\Models\Category;

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

function loadContentHeader($params)
{
    return view('layouts.content.header')->with([
        'home' => $params['home'],
        'action' => $params['action']
    ]);
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

