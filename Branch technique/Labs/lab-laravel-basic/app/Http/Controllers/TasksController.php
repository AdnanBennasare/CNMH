<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(){
        $projects = Project::all();
        $tasks =  Task::paginate(2);
        return view('tasks.index', ['projects' => $projects], ['tasks' => $tasks]);
    }

     public function create(){
        $projects = Project::all();
        return view('tasks.create', ['projects' => $projects]);
     }

     public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'nullable',

        ]);

        // dd('request');
 

        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->save();

       return redirect()->back();

     }
}
