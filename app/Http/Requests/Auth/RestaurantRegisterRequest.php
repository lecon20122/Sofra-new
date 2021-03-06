<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRegisterRequest extends FormRequest
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
            'name' => 'required|max:255|unique:restaurants,name',
            'email' => 'required|max:255|email|unique:restaurants,email',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|min:8',
            'address' => 'required',
        ];
    }
}
