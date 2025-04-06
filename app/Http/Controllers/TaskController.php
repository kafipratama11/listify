<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(){

        $tasks = Task::where('id_user', auth()->id())->orderBy('task_date', 'asc')->get();

        $tasksTodo = Task::where('id_status', 1)->where('archive_status', "active")->where('id_user', auth()->id())->orderBy('task_date', 'asc')->get();
        $tasksInProgress = Task::where('id_status', 2)->where('archive_status', "active")->where('id_user', auth()->id())->orderBy('task_date', 'asc')->get();
        $tasksDone = Task::where('id_status', 3)->where('archive_status', "active")->where('id_user', auth()->id())->orderBy('task_date', 'asc')->get();

        $greeting = $this->getGreeting();

        return view('tasks', compact('tasks' ,'tasksTodo', 'tasksInProgress', 'tasksDone', 'greeting'));
    }

    private function getGreeting(){
    $hour = Carbon::now('Asia/Jakarta')->hour;

    if ($hour >= 5 && $hour < 12) {
            return 'Selamat Pagi';
        } elseif ($hour >= 12 && $hour < 15) {
            return 'Selamat Siang';
        } elseif ($hour >= 15 && $hour < 18) {
            return 'Selamat Sore';
        } else {
            return 'Selamat Malam';
        }
    }

    public function store(Request $request){
        $request->validate([
            'id_status' => 'required|integer',
            'id_category' => 'required|integer',
            'title' => 'required',
            'task_date' => 'required',
            'description' => 'required',
            'deadline' => 'nullable',
            'archive_status' => 'required',
        ]);
        
        Task::create([
            'id_user' => Auth::id(),
            'id_status' => $request->id_status,
            'id_category' => $request->id_category,
            'title' => $request->title,
            'task_date' => $request->task_date,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'archive_status' => $request->archive_status,
        ]);

        return redirect()->back()->with('success', 'Task ditambahkan!');
    }

    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully');
    }
    public function destroyTodo($id){
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully');
    }
    public function destroyInProgress($id){
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully');
    }
    public function destroyDone($id){
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'id_status' => 'required|integer'
        ]);
        $task = Task::findOrFail($id);
        $task->id_status = $request->id_status;
        $task->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }

    public function updateStatusTodo(Request $request, $id)
    {
        $request->validate([
            'id_status' => 'required|integer'
        ]);
        $task = Task::findOrFail($id);
        $task->id_status = $request->id_status;
        $task->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }

    public function updateStatusInProgress(Request $request, $id)
    {
        $request->validate([
            'id_status' => 'required|integer'
        ]);
        $task = Task::findOrFail($id);
        $task->id_status = $request->id_status;
        $task->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }
    
    public function updateStatusDone(Request $request, $id)
    {
        $request->validate([
            'id_status' => 'required|integer'
        ]);
        $task = Task::findOrFail($id);
        $task->id_status = $request->id_status;
        $task->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }

    public function edit($id){
        $task = Task::findOrFail($id);
        return view('edit-task', compact('task'));
    }
}
