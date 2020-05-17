<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkoutRequest extends FormRequest
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
        $this->session()->put('validating',true);
        return [
            'title' => 'required|string|unique:workouts' ,
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'وارد کردن نام حرکت الزامی است',
            'title.string' => 'نام حرکت به صورت رشته نوشته شود',
            'title.unique' => 'حرکت با این اسم قبلا ثبت شده است',

            'category_id.required' => 'مشخص کردن دسته‌بندی تمرین الزامی است'
        ];
    }
}
