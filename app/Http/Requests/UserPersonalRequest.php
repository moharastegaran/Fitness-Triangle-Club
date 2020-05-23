<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPersonalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
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
            'family' => 'required',
            'birthday' => 'required',
            'new_pwd' => 'nullable|required_with:password|min:5|confirmed|different:password',
            'new_pwd_confirmation' => 'required_with:new_pwd'
        ];
    }
}
