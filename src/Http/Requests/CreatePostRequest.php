<?php

namespace blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'post_content' => '',
            'post_title' => 'required|max:255',
            'post_status' => '',
            'post_slug' => 'max:255|unique:posts,id,'.$this->get('id'),
            'comment_status' => '',
            'term_id' => '',
            'active' => '',
        ];
    }

}
