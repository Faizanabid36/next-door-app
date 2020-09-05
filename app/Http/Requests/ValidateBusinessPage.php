<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateBusinessPage extends FormRequest
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
            'title' => 'required|string|max:90',
            'description' => 'required|string|max:2000',
            'business_category_id' => 'required',
            'email' => 'required|email|string',
            'contact_1' => 'required|max:18',
            'contact_2' => 'required|sometimes|max:18',
            'postal_code' => 'required|max:6',
            'banner_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'banner_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
