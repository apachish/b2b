<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditLead extends FormRequest
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
            'name' => 'sometimes|required|max:150',
            'description' => 'sometimes|required|max:150',
            'detail_description' => 'sometimes|required|max:5000',
            'ad_type' => 'sometimes|required',Rule::in(['sell','buy']),
            'image.0' => 'sometimes||required_if:ad_type,sell',
            'image.*' =>'required|mimes:jpeg,bmp,png|max:10240'
        ];
    }
}
