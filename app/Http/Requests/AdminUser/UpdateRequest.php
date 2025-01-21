<?php

namespace App\Http\Requests\AdminUser;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'f_name' => 'required|string|max:50',
            'l_name' => 'required|string|max:50',
            'email' => 'required|email|unique:admin_users,email,'.$this->id.',id',
            'password' => 'same:confirm_password|max:25',
            'status' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ];
    }
}
