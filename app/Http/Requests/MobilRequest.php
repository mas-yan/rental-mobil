<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobilRequest extends FormRequest
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
            'foto' => ['image'],
            'brand_id' => ['required'],
            'type' => ['required'],
            'car_name' => ['required'],
            'price' => ['required'],
            'plat_number' => ['required'],
        ];
    }
}
