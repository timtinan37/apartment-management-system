<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResidentRequest extends FormRequest
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
            'contact_person' => ['required', 'integer', 'gt:0'],
            'flat' => ['required', 'integer', 'gt:0'],
            'no_of_habitats' => ['required', 'integer', 'gt:0'],
        ];
    }
}
