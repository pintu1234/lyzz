<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'title' => 'required',
            'slug'  => 'required|unique:posts',
            'excerpt'=> 'required',
            'body' => 'required',
            'published_at' => 'date_format:Y-m-d H:i:s',
            'category_id' => 'required',
            'image' => 'image|max:1000'

        ];
    }

    public function messages()
    {
       return [
           'published_at.date_format' => 'Published date must be followed by date format',
           'category_id.required'     => 'Choose a valid category from the list',
           'image.image'              => 'Image must be in (jpeg, png, bmp, gif, or svg) format',

        ];
    }
}
