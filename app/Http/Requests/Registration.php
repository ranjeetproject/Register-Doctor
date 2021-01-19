<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Registration extends FormRequest
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
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'email' => 'required|unique:users,email|email|max:255',
            'password' => 'required|max:15|min:6',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'fname.required' => 'First name is required',
            'lname.required'  => 'Last name is required',
        ];
    }

}
