<?php

namespace Blog\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'content' => 'required',
            'title' => 'required|max:255',
            #'status' => '',
            'slug' => 'max:255|unique:posts,id,'.$this->get('id'),
           # 'comment_status' => '',
            #'active' => '',
        ];
    }

}
