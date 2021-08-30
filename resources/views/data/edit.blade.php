@extends('layouts.helloapp')

@section('title', 'Edit')

@section('menubar')
    @parent
    更新ページ
@endsection

@section('content')
    <form action="/data/edit" method="post">
    <table>
        @csrf
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr><th>name: </th><td><input type="text" name="name"
            value="{{$form->name}}"></td></tr>
        <tr><th>mail: </th><td><input type="text" name="mail"
            value="{{$form->mail}}"></td></tr>
        <tr><th>Field4: </th><td><input type="text" name="Field4"
            value="{{$form->Field4}}"></td></tr>
        <tr><th></th><td><input type="submit"
            value="send"></td></tr>
    </table>
    </form>
@endsection
