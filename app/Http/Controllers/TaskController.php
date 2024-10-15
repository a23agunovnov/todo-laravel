<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $categories = Category::all();
        return view('task.index', ['tasks' => $tasks, 'categories' => $categories]);
    }
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = User::find(1)->id;
        $task->category_id = $request->category_id;
        $task->save();
        return redirect('/')->with('successCreate', 'Task was created');
    }
    public function edit($id)
    {
        $task = Task::find($id);
        return view('task.show', ['task' => $task]);
    }
    public function update(Request $request, $id)
    {
        Task::where('id', '=', $id)->update(['title' => $request->title]);
        Task::where('id', '=', $id)->update(['description' => $request->description]);
        return redirect('/')->with('successUpdate', 'Task was updated');
    }
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/')->with('successDelete', 'Task was deleted');
    }
}
