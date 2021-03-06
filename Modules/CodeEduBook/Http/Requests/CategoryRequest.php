<?php

namespace CodeEduBook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    protected $redirectRoute = 'categories.index';

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
        $id = $this->route('category');
        return [
            'name' => "required|max:255|unique:categories,name,$id"
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
