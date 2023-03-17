<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'username' => 'required|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'bio' => 'required|string',
            'type' => 'required|in:first,second,third',
           'certificate_id'=> 'nullable|required_if:type,second|exists:certificates,id',
            'latitude'=> 'nullable|required_if:type,third',
            'longitude'=> 'nullable|required_if:type,third',
            'birth_date' => 'nullable|required_if:type,third|date',

        ];
    }
}
