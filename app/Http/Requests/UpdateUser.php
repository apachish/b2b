<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'company_name' => 'required|max:150',
            'company_logo' => 'required|mimes:jpeg,bmp,png|max:10240',
            'sellerType' => 'required|exists:sellers,id',
            'category' => 'required|exists:categories,id',
            'dealsIn' => 'required|array',
            'dealsIn.*' => 'required|exists:categories,id',
            'company_details' => 'required|max:1000',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'pincode' => 'required',


        ];
    }
}
