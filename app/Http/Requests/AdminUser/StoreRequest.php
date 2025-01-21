<?php

namespace App\Http\Requests\AdminUser;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email' => 'required|email|unique:admin_users,email',
            'password' => 'required|same:confirm_password|min:6|max:25',
            'status' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}
