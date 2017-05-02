<?php

namespace blog\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'content' => '',
            'title' => 'required|max:255',
            'status' => '',
            'slug' => 'max:255|unique:posts,id,' . $this->get('id'),
            'comment_status' => '',
            'term_id' => '',
            'active' => '',
        ];
    }

}
