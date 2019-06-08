<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLead extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:150',
            'description' => 'required|max:150',
            'detail_description' => 'required|max:5000',
            'ad_type' => 'required',Rule::in(['sell','buy']),
            'image.0' => 'required_if:ad_type,sell',
            'image.*' =>'required|mimes:jpeg,bmp,png|max:10240'

        ];
    }
}
