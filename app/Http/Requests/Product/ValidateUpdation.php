<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ValidateUpdation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['required', 'max:100'],
            'price' => ['required', 'regex:/^[0-9\.]+$/'],
            'price_promotion' => ['nullable', 'regex:/^[0-9\.]+$/'],
            'stock' => ['regex:/^[0-9]+$/'],
        ];

        if (Request::all('url_image')) {
            $rules['url_image'] = ['image'];
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required' => __('validation.required', ['attr' => __('common.product')]),
            'name.max' => __('validation.max', ['attr' => __('common.product'), 'max' => '100']),

            'price.required' => __('validation.required', ['attr' => __('common.price')]),
            'price.regex' => __('validation.regex', ['attr' => __('common.price')]),

            'price_promotion.regex' => __('validation.regex', ['attr' => __('common.price_promotion')]),

            'stock.regex' => __('validation.regex', ['attr' => __('common.stock')]),
        ];

        if (Request::all('url_image')) {
            $messages['url_image.image'] = __('validation.image');
        }

        return $messages;
    }
}
