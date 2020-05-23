<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'sender' => 'required' ,
            'email' => 'required' ,
            'subject' => 'required' ,
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'sender.required' => 'وارد کردن نام فرستنده الزامی است',
            'email.required' => 'وارد کردن ایمیل الزامی است',
            'subject.required' => 'وارد کردن موضوع پیام الزامی است',
            'content.required' => 'وارد کردن متن پیام الزامی است',
        ];
    }
}
