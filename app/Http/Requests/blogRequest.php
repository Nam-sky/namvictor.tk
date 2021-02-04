<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class blogRequest extends FormRequest
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
            'nameBlog' => 'required|max:300',
            'fileToUpload' =>'required|mimes:jpeg,jpg,png,gif',
            'mota' => 'required',
            'content' => 'required',
        ];
    }
    public function messages(){
        return [
            'nameBlog.required' => 'Tiêu đề bài viết không được để trống !',
            'nameBlog.max:300' => 'Tiêu đề bài viết không được vượt quá 300 ký tự !',
            'fileToUpload.required' => 'Thumbnail bài viết không được để trống !',
            'fileToUpload.mimes' => 'Định dạng thumbnail không đúng !',
            'mota.required' => 'Mô tả không được để trống !',
            'content.required' => 'Nội dung bài viết không được để trống  !',
        ];
    }
}
