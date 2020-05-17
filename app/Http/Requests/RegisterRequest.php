<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'family' => 'required',
            'email' => array('required','email',auth()->user() ? 'required' : 'unique:users,email'),
            'birthday' => 'required',
            'password' => 'required|min:5',
//            'old_pwd'  => 'required',
//            'new_pwd' => 'nullable|min:5|confirmed|different:password',
//            'new_pwd_confirmation' => 'required_with:new_pwd'
//            'mobile' => 'required|regex:/^0?9[0-39][0-9]{8}$/|unique:users,mobile',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'وارد گردن ایمیل الزامی است, زیرا تنها راه ارسال برنامه برای شماست',
            'email.email' => 'فرمت ایمیل را به درستی وارد کنید',
            'email.unique' => 'ایمیل قبلا در سیستم ثبت شده است',

            'password.required' => 'وارد کردن گزرواژه الزامی است',
            'password.min' => 'گذرواژه حداقل ۴ رقمی است',

            'name.required' => 'وارد کردن نام الزامی است',
            'family.required' => 'وارد کردن نام خانوادگی الزامی است',

            'birthday.required' => 'وارد کردن تاریخ تولد الزامی است'

//            'mobile.required' => 'وارد کردن شماره تماس الزامی است',
//            'mobile.regex' => 'شماره تماس به اشتباه وارد شده است',
//            'mobile.unique' => 'شماره تماس قبلا ثبت شده است' ,
        ];
    }
}
