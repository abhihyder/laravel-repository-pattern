<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressBookRequest extends FormRequest
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
            'address' => 'required',
            'postal_code' => 'required|numeric',
            'contact_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|phone:country_code',
            'country_code' => 'required_with:contact_number,postal_code',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'is_self' => 'required',
            'address_type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'contact_number.phone' => 'invalid contact number'
        ];
    }
}
