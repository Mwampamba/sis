<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ClassPromotionRequestForm extends FormRequest
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

            'from_class_name' => [
                'required'
            ],

            'from_programme_name' => [
                'required'
            ],

            'from_collage_name' => [
                'required'
            ],

            'from_year_name' => [
                'required'
            ],

            'to_class_name' => [
                'required'
            ],

            'to_programme_name' => [
                'required'
            ],

            'to_collage_name' => [
                'required'
            ],

            'to_year_name' => [
                'required'
            ],
        ];
    }
}
