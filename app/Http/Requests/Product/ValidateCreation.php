<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCreation extends FormRequest
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
            'name' => ['required', 'max:100', 'unique:products,name'],
            'price' => ['required', 'regex:/^[0-9\.]+$/'],
            'price_promotion' => ['regex:/^[0-9\.]+$/'],
            'stock' => ['regex:/^[0-9\.]+$/'],
            'url_image' => ['required', 'image'],
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'Tên sản phẩm không được bỏ trống !',
            'name.max' => 'Tên sản phẩm không được quá 100 kí tự !',
            'name.unique' => 'Tên sản phẩm đã tồn tại !',

            'price.required' => 'Đơn giá không được bỏ trống !',
            'price.regex' => 'Đơn giá không đúng định dạng hợp lệ !',

            'price_promotion.regex' => 'Giá khuyến mãi không đúng định dạng hợp lệ !',

            'stock.regex' => 'Số lượng kho không đúng định dạng hợp lệ !',

            'url_image.required' => 'Hình ảnh tải lên trống !',
            'url_image.image' => 'Hình ảnh tải lên không đúng định dạng cho phép !',
        ];

        return $messages;
    }
}
