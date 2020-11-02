<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProperty extends FormRequest
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
            'address'=>'required|min:3',
            'description'=>'required|min:40',
            'property_type'=>'required',
            'no_of_bed_rooms'=>'required',
            'no_of_bath_rooms'=>'required',
            'area_in_sqft'=>'required',
            'minimum_price'=>'required',
            'maximum_price'=>'required|min:3',
            'postal_code'=>'required|min:3',
            'city'=>'required|min:3',
            'neighbourhood'=>'required|min:3',
            'status'=>'required',
        ];
    }
}
