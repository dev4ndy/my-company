<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployee extends FormRequest
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
            'name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('employees', 'email')->ignore($this->employee->id)],
            'phone' => ['regex:/\+?([0-9]{2})-?([0-9]{3})-?([0-9]{6,7})/', Rule::unique('employees', 'phone')->ignore($this->employee->id)],
        ];
    }
}
