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

    public function index(Request $request)
    {

        // dd($request);
       
            $query = $request->input('query');
            $tasks = Task::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', '%' . $query . '%');
            })->paginate(2);
    
            
            if ($request->ajax()) {
                return view('tasks.tasksTable', compact('tasks'));
            } else {       
                return view('tasks.index', compact('tasks'));
            }
        
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
            'title' => 'required',
            'description' => 'nullable',
            'projectsid' => 'required',
        ]);
    
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->project_id = $request->projectsid; // Fix the variable name here
        $task->save();
    
        return redirect('tasks');
    }

    public function update(Request $request, $id){

    //    dd($request);
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'projectsid' => 'required',
        ]);
    
        $task = Task::find($id);
        $task->title = $request->title;
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
