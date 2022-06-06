<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $pattern = "/^[_a-z0-9-]+(.[_a-z0-9-]+)@[a-z0-9-]+(.[a-z0-9-]+)(.[a-z]{2,})$/i";

        $rules = [
            'name' => 'required|string|max:100|unique:users,name',
            'email' => 'required|email:rfc,dns|max:100|unique:users,email',
            'phone' => 'required|numeric|phone:EG,SA|unique:users,phone',
            'password' => 'required|confirmed|min:6',
            'birth_date' => 'required|date',
            'identity' => 'required|numeric',
            'membership_type' => 'required|in:normal,volunteer',
           // 'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
            'is_active' => 'boolean',

        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'name' => 'required|string|max:100|unique:users,name,'. $this->user->id,
                'email' => 'required|email|max:100|unique:users,email,' . $this->user->id,
                'phone' => 'required|numeric|phone:EG,SA|unique:users,phone,' . $this->user->id,
                'password' => 'nullable|confirmed|min:6',
                'birth_date' => 'required|date',
                'identity' => 'required|numeric',
                'membership_type' => 'required|in:normal,volunteer',
               // 'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
                'is_active' => 'boolean',
            ];
        }
        return $rules;
    }
}
