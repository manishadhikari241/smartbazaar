<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
            'name' => 'required|max:255',
            'product_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'brand_id' => 'required',
            'sku' => 'max:50',
            'from'=>'required',
            'to'=>'required',
                        'image'=>'required',
                                    'category_id'=>'required'


        ];
    }
}
