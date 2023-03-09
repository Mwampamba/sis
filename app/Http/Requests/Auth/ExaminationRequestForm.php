<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ExaminationRequestForm extends FormRequest
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
            'exam_name' => [
                'required'
            ],

            'exam_type' => [
                'required'
            ],

            'semester' => [
                'required'
            ],

            'year' => [
                'required'
            ],

            'status' => [
                'required'
            ],

            'classes' => [
                'required'
            ],

            'description' => [
                'nullable'
            ]
        ];
    }
}
