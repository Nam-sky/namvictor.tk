<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class commentRequest extends FormRequest
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
            'name' => 'required|min:2|max:15',
            'email' => 'required|email',
            'content' => 'required|max:500',
        ];
    }
    public function messages()
	{
	   return [
          'name.required' => 'Bạn chưa nhập tên.',
          'name.min' => 'Tên tối thiểu là 2 ký tự.',
          'name.max' => 'Tên tối đa là 15 ký tự.',
          'email.required' => 'Bạn chưa nhập Email.',
          'email.email' => 'Vui lòng nhập đúng định dạng Email.',
          'content.required' =>'Bạn chưa nhập nội dung bình luận.',
          'content.max' =>'Nội dung bình luận không được vượt quá 250 ký tự.',
	   ];
	}
}
