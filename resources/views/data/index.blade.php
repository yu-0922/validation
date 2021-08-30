@extends('layouts.helloapp')
@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
<table>
    <tr><th>Name</th><th>Mail</th><th>Field4</th></tr>
    @foreach ($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->Field4}}</td>
        </tr>
    @endforeach
</table>
@endsection

@section('footer')
    copyright 2021 yusuke
@endsection
