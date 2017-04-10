<?php

namespace CodeEduUser\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSettingRequest extends FormRequest
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
            'password' => "required|min:6|max:255|confirmed"
        ];
    }

    /*
    public function messages()
    {
        return [
            'required' => 'O :attribute é obrigatório',
            'unique' => 'O :attribute digitado está sem uso'
        ];
        //'name.required' => 'O nome é obrigatório'
    }

    public function attributes()
    {
        return [
            'name' => 'nome'
        ];
    }
    */
}
