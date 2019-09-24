<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompany extends FormRequest
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
            'name' => ['required', Rule::unique('companies', 'name')->ignore($this->company->id)],
            'email' => ['required', 'email', Rule::unique('companies', 'email')->ignore($this->company->id)],
            'website' => 'required|url',
            'logo' => 'dimensions:min_width=100,min_height:100|mimes:jpeg,png',
        ];
    }
}
