<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        // Task 테이블의 모든 정보를 조회
        $tasks = auth()->user()->tasks()->latest()->get();
//        Task::latest()->where('user_id', auth()->id())->get();
        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {
        request()->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        $values = request(['title', 'body']);
        $values['user_id'] = auth()->id();
//        $task = Task::create(request(['title', 'body']));
        $task = Task::create($values);

        return redirect('/tasks/'.$task->id);
    }

    public function show(Task $task)
    {
//        if(auth()->id() != $task->user_id){
//            abort(403);
//        }
        //abort_if(auth()->id() != $task->user_id, 403);
        // 로그인한 유저의 정보를 알려줌
        // 로그인한 유저가 태스크를 소유하지 않다면
        //abort_if(!auth()->user()->owns($task), 403);
        abort_unless(auth()->user()->owns($task), 403);
        return view('tasks.show', [
            'task' => $task
        ]);
    }

    public function edit(Task $task){
        abort_unless(auth()->user()->owns($task), 403);
        return view('tasks.edit',[
            'task' => $task
        ]);
    }

    public function update(Task $task){
        request()->validate([
            'title'=>'required',
            'body'=>'required'
        ]);

        abort_unless(auth()->user()->owns($task), 403);

        $task->update(request(['title', 'body']));
        return redirect('/tasks/'.$task->id);
    }

    public function destroy(Task $task){
        abort_unless(auth()->user()->owns($task), 403);
        $task->delete();

        return redirect('/tasks');
    }
}
