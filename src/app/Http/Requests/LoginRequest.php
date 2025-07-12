<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\LoginRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ];
    }

    public function messages()
    {
       return [
           'email.required' => 'メールアドレスを入力してください。',
           'email.email' => 'メールアドレスの形式で入力してください。',
           'password.required' => 'パスワードを入力してください',
           'password.min' => 'パスワードは8文字以上で入力してください。',
       ];
    }

    public function store(LoginRequest $request)
    {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();

        return redirect()->intended('/dashboard');
    }

    // 認証失敗時」のメッセージを設定
    return back()->withErrors([
        'auth' => 'ログイン情報が登録されていません。',
    ]);
    }
}
