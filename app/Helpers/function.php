<?php

use App\Models\Category;

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

