<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdvertisment extends FormRequest
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
            'captcha_request' => 'required|captcha',
            'email' => 'required|email',
            'name' => 'required',
            'mobile' => ['required',new PhoneNumber()],
            'phone_number' => 'required',
            'company_name' => 'required',
            'banner_position' => 'required',
            'time_duration' => 'required|max:12|min:1',
            'image' => 'required|mimes:jpeg,bmp,png'|'max:30240',
            'banner_page' => 'required',
            'banner_url' => 'required',
            'parentId' => 'required',
            'parent' => 'required',
            'category' => 'required',
            'comment' => 'required',
            ];
    }
}
