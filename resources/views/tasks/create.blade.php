@extends('layout')

@section('title', 'Create Task')

@section('content')
    <h1>Tasks List</h1>
    <form action="/tasks" method="post">
        <label for="title">title</label>
        <input type="text" name="title" id="title">
        <br>
        <label for="body">Body</label>
        <textarea name="body" id="body" cols="30" rows="10"></textarea>
        <button>submit</button>
    </form>
@endsection
