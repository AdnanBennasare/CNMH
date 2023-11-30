<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    // public function index(){
    //     $tasks =  Task::paginate(2);
    //     return view('tasks.index', compact('tasks'));
    // }

    public function index(Request $request){
        $tasks = Task::paginate(2);
        if($request->ajax()){
            dd('hey');
            $seachQuery = $request->get('searchValue');
            $seachQuery = str_replace(' ','%', $seachQuery);
            $tasks = Task::query()->where('name','like','%'.$seachQuery. '%')->orWhere('description' , 'like' , '%' . $seachQuery . '%')->paginate(2);
            return view('tasks.tasksTable' , compact('tasks'))->render();
        }
       
        return view('tasks.index', compact('tasks'));
    }

     public function create(){
        $projects = Project::all();
        return view('tasks.create', ['projects' => $projects]);
     }

     public function edit($id){
        $projects = Project::all();
        $task = Task::find($id);
        $selectedproject = Project::find($task->project_id);
        // $projectName = $project->name;
        return view('tasks.edit', compact('task', 'selectedproject', 'projects'));
     }


    public function store(Request $request){

        // dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'projectsid' => 'required',
        ]);
    
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->project_id = $request->projectsid; // Fix the variable name here
        $task->save();
    
        return redirect('tasks');
    }

    public function update(Request $request, $id){

    //    dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'projectsid' => 'required',
        ]);
    
        $task = Task::find($id);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->project_id = $request->projectsid; // Fix the variable name here
        $task->save();
    
        return redirect('tasks');
    }


    public function destroy($id){
        $delete = Task::find($id)->delete();
        return redirect('tasks');


    }

    public function show($id){

    }



}
