<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LecturerRequestForm extends FormRequest
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
            'name' => [
                'required'
            ],

            'email' => [
                'required',
                'email'
            ],

            'department' => [
                'required'
            ],

            'phone' => [
                'required'
            ],

            'staff_id' => [
                'required'
            ],

            'role' => [
                'required'
            ],

            'old_password' => [
                'required'
            ],

            'new_password' => [
                'required'
            ],

            'confirm_password' => [
                'required'
            ]
        ];
    }
}
