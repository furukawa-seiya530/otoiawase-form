<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string',
            'email' => 'required|email',
            'phone1' => 'required|digits:3',
            'phone2' => 'required|digits:4',
            'phone3' => 'required|digits:4',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
            'inquiry_type' => 'required|string',
            'inquiry_content' => 'required|string|max:120',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => '姓を入力してください',
            'last_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'phone1.required' => '電話番号を入力してください',
            'phone1.digits' => '電話番号は3桁の数字で入力してください',
            'phone2.required' => '電話番号を入力してください',
            'phone2.digits' => '電話番号は4桁の数字で入力してください',
            'phone3.required' => '電話番号を入力してください',
            'phone3.digits' => '電話番号は4桁の数字で入力してください',
            'address.required' => '住所を入力してください',
            'inquiry_type.required' => 'お問い合わせの種類を選択してください',
            'inquiry_content.required' => 'お問い合わせ内容を入力してください',
            'inquiry_content.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
