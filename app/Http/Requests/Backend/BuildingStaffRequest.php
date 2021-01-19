<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BuildingStaffRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'designation' => ['required', 'string', 'min:2', 'max:255'],
            'phone' => ['required', 'string', 'min:5'],
            'nid_no' => ['required', 'digits_between:10,17'],
        ];
    }
}
