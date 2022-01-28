<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'name' => 'required|unique:tasks',
            'status_id' => 'required',
            'created_by_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это обязательное поле',
            'status_id.required' => 'Это обязательное поле',
            'created_by_id.required' => 'Это обязательное поле',
            'name.unique' => 'Задача с таким именем уже существует',
        ];
    }
}
