<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class descController extends Controller
{
    //
    public function upload(Request $request)
    {
        $path = $request->file('image')->store('uploads', 'public');
        $task = new Task;
        $task->name = $path;
        $task->save();


//        return view('default', ['pat' => $path]);

        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('default', [
            'tasks' => $tasks
        ]);
    }
}
