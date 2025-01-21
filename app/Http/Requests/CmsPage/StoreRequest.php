<?php

namespace App\Http\Requests\CmsPage;

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
            'page_name' => 'required|unique:cms_pages,page_name,NULL,NULL',
            'title' => 'required|max:50',
            // 'meta_keyword' => 'required|max:50',
            // 'meta_description' => 'required|max:1000',
            // 'body' => 'required|max:1000',
        ];
    }
}
