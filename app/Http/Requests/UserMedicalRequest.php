<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserMedicalRequest extends FormRequest
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
            'blood_type' => 'required',
            'weight' => 'required|numeric|max:1000',
            'height' => 'required|numeric|max:250',
        ];
    }

    public function messages()
    {
        return [
            'blood_type.required' => 'وارد کردن نوع گروه خونی الزامی است' ,
            'weight.required' => 'وارد کردن وزن الزامی است' ,
            'weight.numeric' => 'وزن باید به صورت عددی باشد' ,
            'weight.max' => 'وزن بیشتر از حد نساب است' ,
            'height.required' => 'وارد کردن قد الزامی است' ,
            'height.numeric' => 'قد باید به صورت عددی باشد' ,
            'height.max' => 'قد بیشتر از حد نساب است' ,
        ];
    }
}
