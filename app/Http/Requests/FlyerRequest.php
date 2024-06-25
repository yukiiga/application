<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlyerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'flyer.image_url' => 'required|file',
            'flyer.from_period' => 'required|date',
            'flyer.to_period' => 'required|date',
        ];
    }
}
