<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
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
//        $id = $this->route('tasks')->id;
//        dd($this->task->id);
        return [
            'name' => ['required', Rule::unique('tasks')->ignore($this->task->id)],
            'status_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это обязательное поле',
            'status_id.required' => 'Это обязательное поле',
            'name.unique' => 'Задача с таким именем уже существует',
        ];
    }
}
