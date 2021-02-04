<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'username' => 'required|alpha|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }
    public function messages(){
        return [
            'username.required' => 'User Name không được để trống !',
            'username.min' => 'User Name phải lớn hơn !',
            'username.alpha' => 'User Name không được bao gồm số và các ký tự đặc biệt !',
            'email.required' => 'Email không được để trống !',
            'email.email' => 'Định dạng Email không đúng',
            'password.required' => 'Password không được để trống !',
            'password.min' => 'Password tối thiểu là 6 ký tự',
        ];
    }
}
