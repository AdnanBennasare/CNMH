<?php

namespace App\Http\Controllers;

use App\Models\Task;
// use App\Repositories\ProjectRepository;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Http\Requests\createTaskRequest;

class TaskController extends Controller
{
    
private $taskRepository;

    public function __construct(TaskRepository $TaskRepository) {
        $this->taskRepository = $TaskRepository;
    }



    // public function index(Request $request)
    // {
    //     // dd('hey');
    //     $query = $request->input('query');
    //     $tasks = $this->taskRepository->paginate($query);
        
    //     if ($request->ajax()) {
    //         return view('tasks.tasksTable')->with('tasks', $tasks);
    //     } 
    //     $projects = Project::all();
    //     return view('tasks.index', compact('tasks', 'projects'));
    // }
    public function index(Request $request)
    {
        $query = $request->input('query');
        $tasks = Task::with('project')
            ->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', '%' . $query . '%')
                             ->orWhereHas('project', function($projectQuery) use ($query) {
                                 $projectQuery->where('name', 'like', '%' . $query . '%');
                             });
            })
            ->paginate(8); // Adjust the pagination limit as per your requirement
    
        if ($request->ajax()) {
            return view('tasks.tasksTable', compact('tasks'));
        } else {
            $projects = Project::all(); 
            return view('tasks.index', compact('tasks', 'projects'));       
        }
    }

    public function create(Request $request)
    {

        $project_id = $request->input('project_id');
        $project_name = Project::find($project_id)->name; 
        return view('tasks.create', compact('project_id', 'project_name'));
    }

    public function store(createTaskRequest $request)
    {
        $input = $request->all();
        $this->taskRepository->create($input);
        return redirect()->route('tasks.index')->with('success', 'produit ajouté avec succès');
    }

public function destroy($id){
    Task::find($id)->delete();
    return redirect()->route('tasks.index')->with('success', 'produit suprimer avec succès');
}


public function edit($id){
    $task = Task::find($id);
    return view('tasks.edit', compact('task'));
}


public function update(Request $request, $id)
{


    $task = Task::find($id);
    if (!$task) {
        return redirect()->route('tasks.index')->with('error', 'tâche introuvable');
    }
    $request->validate([
        'title' => 'required|unique:tasks,title,' . $id,
        'description' => 'nullable|string|max:1000',
        'project_id' => 'required|integer',
       
    ]);

    $input = $request->all();
    $task->update($input);
    return redirect()->route('tasks.index')->with('success', 'tâche mise à jour avec succès');
}


}
