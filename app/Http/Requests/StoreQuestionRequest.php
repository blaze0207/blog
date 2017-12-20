<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:6|max:60',
            'body' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '標題不能為空',
            'title.min' => '標題不能少於 6 個字',
            'title.max' => '標題不能多於 60 個字',
            'body.required' => '內容不能為空',
            'body.min' => '標題不能少於 3 個字',
        ];
    }
}
