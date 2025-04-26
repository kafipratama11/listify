<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ArchiveController extends Controller
{
    public function index(){
        $tasksArchive = Task::where('id_user', auth()->id())->where('archive_status', "archived")->orderBy('task_date', 'asc')->get();

        $taskId = Task::where('id_user', auth()->id())->where('archive_status', "archived")->get('id');

        $taskTodoCount = Task::where('id_status', 1)->where('id_user', auth()->id())->where('archive_status', "archived")->count();
        $taskOnProgressCount = Task::where('id_status', 2)->where('id_user', auth()->id())->where('archive_status', "archived")->count();
        $taskDoneCount = Task::where('id_status', 3)->where('id_user', auth()->id())->where('archive_status', "archived")->count();

        return view('archives', compact('tasksArchive', 'taskTodoCount', 'taskOnProgressCount', 'taskDoneCount', 'taskId'));
    }

    public function updateArchiveStatus(Request $request, $id){
        $request->validate([
            'archive_status'=> 'required'
        ]);

        $task = Task::findOrFail($id);

        $task->archive_status = $request->archive_status;
        $task->save();

        return redirect('archive')->with('success', 'status diubah');
    }

    public function updateArchiveStatusActive(Request $request, $id){
        $request->validate([
            'archive_status' => 'required'
        ]);

        $task = Task::findOrFail($id);

        $task->archive_status = $request->archive_status;
        $task->save();

        return redirect('task')->with('success', 'status diubah');
    }
}
