<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DatabaseController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::table('people')->orderBy('Field4', 'desc')->get();
        return view('data.index', ['items'=>$items]);
    }

    public function post(Request $request)
    {
        $items = DB::select('select * from people');
        return view('data.index', ['items'=>$items]);
    }

    public function add(Request $request)
    {
        return view('data.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'Field4' => $request->Field4,
        ];
        DB::table('people')->insert($param);
        return redirect('/data');
    }

    public function show(Request $request)
    {
        $page = $request->page;
        $items = DB::table('people')
            ->offset($page * 3)
            ->limit(3)
            ->get();
        return view('data.show', ['items' => $items]);
    }

    public function edit(Request $request)
    {
        $item = DB::table('people')->where('id', $request->id)->first();
        return view('data.edit', ['form'=>$item]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'Field4' => $request->Field4,
        ];
        DB::table('people')->where('id', $request->id)->update($param);
        return redirect('/data');
    }

    public function delete(Request $request)
    {
        $item = DB::table('people')->where('id', $request->id)->first();
        return view('data.delete', ['form'=>$item]);
    }

    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::table('people')->where('id', $request->id)->delete();
        return redirect('/data');
    }
}
