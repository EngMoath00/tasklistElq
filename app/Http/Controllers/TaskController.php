<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('name', 'asc')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Task::find($id)->delete();

        return redirect()->back();
    }

    public function edite(Request $request)
    {

        $task = Task::select('id', 'name')
            ->find($request->id);

        $tasks = Task::orderBy('name', 'asc')->get();

        return view('tasks.index', compact('task', 'tasks'));
    }

    public function update(Request $request)
    {
        //dd($request);

        Task::where('id', $request->id)
            ->update(['name' => $request->name]);

        return redirect()->route('tasksIndex');
    }
}
