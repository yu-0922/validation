<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *フォームリクエストの利用が許可されているかどうかを示す
     * @return bool
     */
    public function authorize()
    {
        //$this->pathでアクセスしたパスがhelloだった場合に利用できる
        if ($this->path() == 'hello'){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *適用されるバリデーションの検証ルールを設定
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric | between:0,150',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必ず入力して下さい。',
            'mail.email'  => 'メールアドレスが必要です。',
            'age.numeric' => '年齢を整数で記入下さい。',
            'age.between' => '年齢は０～150の間で入力下さい。',
        ];
    }
}
