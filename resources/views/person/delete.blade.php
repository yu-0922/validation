@extends('layouts.helloapp')

@section('titile', 'Person.Delete')

@section('menubar')
    @parent
    削除ページ
@endsection

@section('content')
    <form action="/person/delete" method="post">
        <table>
            @csrf
            <input type="hidden" name="id" value="{{$form->id}}">
                <tr><th>name: </th><td>{{$form->name}}</td></tr>
                <tr><th>mail: </th><td>{{$form->mail}}</td></tr>
                <tr><th>age: </th><td>{{$form->Field4}}</td></tr>
                <tr><th></th><td><input type="submit" value="send"></td></tr>
        </table>
    </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
