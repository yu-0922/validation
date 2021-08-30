<?php

// HelloControllerクラスはこの名前空間に配置される
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
    public function index(Request $request) {
        return view('hello.index', ['msg'=>'フォームを入力ください。']);
    }

    //ここでバリデーションの処理を行う
    public function store(HelloRequest $request) {
        return view('hello.index', ['msg'=>'正しく入力されました。']);
    }
}
