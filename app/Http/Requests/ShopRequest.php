<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'shop.name' => 'required|string|max:50',
            'shop.address' => 'nullable|string|max:100',
            'shop.tel' => 'nullable|string|max:50',
            'shop.image_url' => 'nullable|string|max:100',
            'shop.open' => 'nullable|time',
            'shop.close' => 'nullable|time',
        ];
    }
}
