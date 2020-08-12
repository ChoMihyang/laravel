@extends('layout')

@section('title', 'Task detail')

@section('content')
    <div class="px-64">
    <h1 class="font-bold text-3xl">Task</h1>
        Title: {{ $task->title }} <small class="float-right">Created at {{ $task->created_at }}</small><br>
        Body
        <div class="border p-3">{{ $task->body }}</div>
    </div>
@endsection
