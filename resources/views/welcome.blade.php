@extends('layout')

@section('title')
    Welcome
@endsection

@section('content')
    Welcome
    <ul>
        <?php foreach($books as $book):?>
        <li>{{ $book }}</li>
        <?php endforeach;?>
    </ul>
@endsection
