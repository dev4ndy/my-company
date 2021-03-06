<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompany extends FormRequest
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
            'name' => 'required|unique:companies,name',
            'email' => 'required|email|unique:companies,email',
            'website' => 'url|unique:companies,website',
            'logo' => 'dimensions:min_width=100,min_height:100|mimes:jpeg,png',
        ];
    }
}
