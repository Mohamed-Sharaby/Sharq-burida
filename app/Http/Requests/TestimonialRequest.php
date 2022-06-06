<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
        $rules = [
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
            'name' => 'required',
        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'content' => 'required',
                'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
                'name' => 'required',
            ];
        }
        return $rules;
    }
}
