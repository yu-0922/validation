<?php

// HelloControllerクラスはこの名前空間に配置される
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Validator;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $sort = $request->sort;
        $items = Person::orderBy($sort, 'asc')->paginate(5);
        $param = ['items'=> $items, 'sort'=>$sort, 'user'=>$user];
        return view('hello.index', $param);
    }

    //ここでバリデーションの処理を行う
    public function store(HelloRequest $request)
    {
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

    public function getAuth(Request $request)
    {
        $param = ['message' => 'ログインして下さい。'];
        return view('hello.auth', $param);
    }

    public function postAuth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email,
                'password' => $password])) {
            $msg = 'ログインしました。（' . Auth::user()->name . '）';
        } else {
            $msg = 'ログインに失敗しました。';
        }
        return view('hello.auth', ['message' => $msg]);
    }

}
