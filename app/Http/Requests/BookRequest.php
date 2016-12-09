<?php

namespace App\Http\Requests;

use App\Book;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookRequest extends FormRequest
{

    protected $redirectRoute = 'books.index';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->route('book')) {
            if ($this->route('book')->user_id != Auth::user()->id) {
              return false;
            }
        }

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
            'title' => 'required|max:255|min:3',
            'subtitle' => 'required|max:255|min:3',
            'price' => 'required',
            'user_id' => 'required'
        ];
    }

}
