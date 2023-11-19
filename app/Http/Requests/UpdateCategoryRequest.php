<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'name' => 'required|max:255',
            // 'description' => 'required',
            // 'status' => 'required',b
            // 'book_image' => 'image',
            // 'images' => 'image',
            // 'original_price' => 'required',
            // 'price' => 'required',
            // 'publish_house' => 'required|max:100',
            // 'id_author' => 'required',
            // 'id_author' => 'required',
           
        ];
    }
}
