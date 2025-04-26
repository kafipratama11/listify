<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(){

        $tasks = Task::where('id_user', auth()->id())->where('archive_status', "active")->orderBy('task_date', 'asc')->get();

        $taskId = Task::where('id_user', auth()->id())->where('archive_status', "active")->get('id');

        $taskTodo = Task::where('id_status', 1)->where('id_user', auth()->id())->where('archive_status', "active")->orderBy('task_date', 'asc')->get();
        $taskOnProgress = Task::where('id_status', 2)->where('id_user', auth()->id())->where('archive_status', "active")->orderBy('task_date', 'asc')->get();
        $taskDone = Task::where('id_status', 3)->where('id_user', auth()->id())->where('archive_status', "active")->orderBy('task_date', 'asc')->get();

        $taskTodoCount = Task::where('id_status', 1)->where('id_user', auth()->id())->where('archive_status', "active")->count();
        $taskOnProgressCount = Task::where('id_status', 2)->where('id_user', auth()->id())->where('archive_status', "active")->count();
        $taskDoneCount = Task::where('id_status', 3)->where('id_user', auth()->id())->where('archive_status', "active")->count();
        
        return view('tasks', compact('tasks', 'taskTodo', 'taskOnProgress', 'taskDone', 'taskTodoCount', 'taskOnProgressCount', 'taskDoneCount', 'taskId'));
    }

    public function edit($id){
        $task = Task::findOrFail($id);

        return view('edit-task', compact('task'));
    }

    public function store(Request $request){
        $request->validate([
            'id_category' => 'required|integer',
            'id_status' => 'required|integer',
            'title' => 'required',
            'description' => 'required',
            'task_date' => 'required',
            'deadline' => 'nullable',
            'archive_status' => 'nullable'
        ]);

        Task::create([
            'id_user' => auth()->id(),
            'id_category' => $request->id_category,
            'id_status' => $request->id_status,
            'title' => $request->title,
            'description' => $request->description,
            'task_date' => $request->task_date,
            'deadline' => $request->deadline,
            'archive_status' => $request->archive_status
        ]);

        return redirect()->back()->with('success', 'task berhasil dibuat');
    }

    public function update(Request $request, $id){
        $request->validate([
            'id_category' => 'required|integer',
            'title' => 'required',
            'description' => 'required',
            'task_date' => 'required',
            'deadline' => 'nullable|after_or_equal:task_date'
        ]);

        $task = Task::findOrFail($id);

        $task->id_category = $request->id_category;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->task_date = $request->task_date;
        $task->deadline = $request->deadline;
        $task->save();

        return redirect('/task')->with('success', 'task berhasil diubah');
    }

    public function updateStatusList(Request $request, $id){
        $request->validate([
            'id_status'
        ]);

        $task = Task::findOrFail($id);

        $task->id_status = $request->id_status;
        $task->save();

        return redirect()->back()->with('success', 'status diubah');
    }

    public function updateStatusTodo(Request $request, $id){
        $request->validate([
            'id_status'
        ]);

        $task = Task::findOrFail($id);

        $task->id_status = $request->id_status;
        $task->save();

        return redirect()->back()->with('success', 'status diubah');
    }

    public function updateStatusOnProgress(Request $request, $id){
        $request->validate([
            'id_status'
        ]);

        $task = Task::findOrFail($id);

        $task->id_status = $request->id_status;
        $task->save();

        return redirect()->back()->with('success', 'status diubah');
    }

    public function updateStatusDone(Request $request, $id){
        $request->validate([
            'id_status'
        ]);

        $task = Task::findOrFail($id);

        $task->id_status = $request->id_status;
        $task->save();

        return redirect()->back()->with('success', 'status diubah');
    }

    public function deleteTaskList($id){
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->back()->with('success', 'task berhasi dihapus');
    }

    public function deleteTaskTodo($id){
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->back()->with('success', 'task berhasi dihapus');
    }
    
    public function deleteTaskOnProgress($id){
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->back()->with('success', 'task berhasi dihapus');
    }

    public function deleteTaskDone($id){
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->back()->with('success', 'task berhasi dihapus');
    }
}
