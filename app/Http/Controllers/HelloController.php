<?php

// HelloControllerクラスはこの名前空間に配置される
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
    public function index(Request $request) {
        return view('hello.index', ['msg'=>'フォームを入力：']);
    }

    //ここでバリデーションの処理を行う
    public function store(Request $request) {
        //makeメソッドを使ってValidatorインスタンスを作成し、第1引数にチェックする値の配列、第2引数にルールの配列を入れる
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ]);
        //バリデーションチェックでエラーが発生した場合
        if($validator->fails()) {
            return redirect('/hello')
                            ->withErrors($validator)  //エラーメッセージを一緒に引き継ぐ
                            ->withInput(); //送信されたフォームの値をそのまま引き継ぐ
        }
        return view('hello.index', ['msg'=>'正しく入力されました。']);
    }
}
