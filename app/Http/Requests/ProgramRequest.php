<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
            'requester_name' => 'required',
            'from' => 'required',
            'duration' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'from.required' => 'وارد کردن تاریخ شروع برنامه الزامی است',
            'duration.required' => 'وارد کردن مدت زمان اجرای برنامه الزامی است',
            'requester_name.required' => 'وارد کردن نام ورزشکار الزامی است'
        ];
    }
}
