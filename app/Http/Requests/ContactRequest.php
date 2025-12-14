<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10|max:5000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập họ và tên',
            'name.max' => 'Họ tên không được quá 255 ký tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không được quá 255 ký tự',
            'message.required' => 'Vui lòng nhập tin nhắn',
            'message.min' => 'Tin nhắn phải có ít nhất 10 ký tự',
            'message.max' => 'Tin nhắn không được quá 5000 ký tự',
        ];
    }
}