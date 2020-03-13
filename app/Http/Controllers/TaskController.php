<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $all = Task::where('completed', '=', 0)->get();
        $tasks_false = Task::where('completed', false)->get();
        $tasks_true = Task::where('completed', true)->get();

        return view('tasks', compact(['tasks_false', 'tasks_true', 'all']));
    }
    public function store(Request $request)
    {
        $task = $request->validate([
            'name' => 'required|min:5',
        ]);

        $task = new Task;
        $task->name = $request->input('name');
        $task->completed = 0;
        $task->save();

        return redirect()->back()->with('message', 'New task has been added !');
    }

    public function complete($id)
    {
        $task = Task::findOrFail($id);
        $task->completed = 1;
        $task->save();
        return redirect()->back()->with('message', 'Task has been added to completed list !');
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->back()->with('message', 'Task has been deleted succesfully !');
    }

    function return ($id) {
        $task = Task::findOrFail($id);
        $task->completed = 0;
        $task->save();
        return redirect()->back()->with('message', 'Task has been returned to the list !');
    }

}
