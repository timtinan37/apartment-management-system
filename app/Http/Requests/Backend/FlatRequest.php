<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FlatRequest extends FormRequest
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
            'flat_no' => ['required', 'string', Rule::unique('flats')->ignore($this->flat)],
            'floor' => ['required', 'integer', 'gte:0'],
            'owner' => ['required', 'integer', 'gt:0'],
            'status' => ['required', 'in:OCCUPIED,VACANT']
        ];
    }
}
