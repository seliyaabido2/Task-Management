<?php

namespace App\Http\Requests\User;

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
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email|max:1000',
            'phone' => 'required|min:8|max:15',
            'address' => 'required|max:1000',
            'city_id' => 'required',
            'club_id' => 'required',
            'play_side' => 'required',
            'total_game_played' => 'required',
            'rating' => 'required|between:0,5',
            'vision_level' => 'required',
            'description' => 'required|max:1000',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}
