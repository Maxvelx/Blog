<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'       => 'required | string',
            'content'     => 'required | string',
            'image'       => 'required |file',
            'category_id' => 'required | integer | exists:categories,id',
            'tag_ids'     => 'nullable | array',
            'tag_ids.*'   => 'nullable | exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Need to fill in this filed',
            'title.string'   => 'This field need to be string type',

            'content.required' => 'This field need to be fill',
            'content.string'   => 'This field need to be a string type',
        ];
    }
}
