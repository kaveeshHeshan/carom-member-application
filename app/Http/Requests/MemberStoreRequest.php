<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberStoreRequest extends FormRequest
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
            'full_name' => 'required|string|min:3|max:100',
            'address' => 'required|string|min:3|max:255',
            'contact_number' => 'required|numeric|gt:0',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'membership_type' => 'required|string',
        ];
    }
}
