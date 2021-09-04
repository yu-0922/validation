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

    public function rest(Request $request)
    {
        return view('hello.rest');
    }

    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get('msg');
        return view('hello.session', ['session_data' => $sesdata]);
    }

    public function ses_post(Request $request)
    {
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return redirect('hello/session');
    }

}
