<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Validators\Failure;
// use Maatwebsite\Excel\Concerns\SkipsFailures;
// use Maatwebsite\Excel\Concerns\SkipsOnFailure;
// use Maatwebsite\Excel\Concerns\SkipsOnError;
// use Maatwebsite\Excel\Concerns\SkipsErrors;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductImport implements
    ToCollection,
    WithHeadingRow,
    WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            Product::create([
                'name' => $row['name'],
                'slug' => Str::slug($row['name']).time(),
                'description' => $row['description'],
                'price' => $row['price'],
                'price_promotion' => $row['price_promotion'],
                'stock' => $row['stock'],
                'category_id' => $row['category_id'],
            ]);
        }
    }

    public function rules(): array
    {
        $rules = [
            '*.name' => ['required', 'max:100', 'unique:products,name'],
            '*.price' => ['required', 'regex:/^[0-9\.]+$/'],
            '*.price_promotion' => ['nullable', 'regex:/^[0-9\.]+$/'],
            '*.stock' => ['regex:/^[0-9]+$/'],
            '*.category_id' => ['required'],
        ];

        return $rules;
    }

    public function customValidationMessages(): array
    {
        $messages = [
            '*.name.required' => __('validation.required', ['attr' => 'Name']),
            '*.name.max' => __('validation.max', ['attr' => 'Name']),
            '*.name.unique' => __('validation.unique', ['attr' => 'Name']),

            '*.price.required' => __('validation.required', ['attr' => 'Price']),
            '*.price.regex' => __('validation.regex', ['attr' => 'Price']),

            '*.price_promotion.regex' => __('validation.regex', ['attr' => 'Price Promotion']),
            '*.stock.regex' => __('validation.regex', ['attr' => 'Stock']),

            '*.category_id.required' =>  __('validation.required', ['attr' => 'Category ID']),
        ];

        return $messages;
    }
}
