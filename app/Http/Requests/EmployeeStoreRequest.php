<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'name'      => 'required|string',
            'surname'      => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'email'     => 'email:rfc,dns|nullable',
            'phone'      => 'numeric|nullable'
        ];
    }
}
