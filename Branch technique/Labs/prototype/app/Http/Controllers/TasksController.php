<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Exports\TaskExport;
use App\Imports\TaskImport;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CreateTaskRequest;


class TasksController extends Controller
{

    private $taskRepository;
    //

    public function __construct(TaskRepository $TaskRepository)
    {
        $this->taskRepository = $TaskRepository;
    }

    // ========== index Function ==========
    public function index(Request $request)
    {

        $projectID = $request->input('project');

        // Dump and die to check the project ID
        // dd($projectID);
        $query = $request->input('query');
        $tasks = Task::with('project')
            ->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', '%' . $query . '%')
                             ->orWhereHas('project', function($projectQuery) use ($query) {
                                 $projectQuery->where('Name', 'like', '%' . $query . '%');
                             });
            })
            ->paginate(2); 
    
        if ($request->ajax()) {
            return view('tasks.taskTablePartial', compact('tasks'));
        } else {
            $projects = Project::all();
            return view('tasks.index', compact('tasks', 'projects', 'projectID'));       
        }
    }


    // ======= create =========
    public function create(Request $request)
    {

            $projects = Project::all();
            return view('tasks.create', ['projects' => $projects]);

    }

    // ======= store =========

    public function store(CreateTaskRequest $request)
    {
        $input = $request->all();
        $this->taskRepository->create($input);
        return redirect()->route('tasks.index')->with('success', 'produit ajouté avec succès');
    }




    // ======= edit =========



    public function edit($id){
        $projects = Project::all();
        $task = Task::find($id);
        $selectedproject = Project::find($task->project_id);
        // $projectName = $project->name;
        return view('tasks.edit', compact('task', 'selectedproject', 'projects'));
     }

    // ======= update =========

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


    // ======= show =========


    public function show($id){
        $task = Task::find($id);
        if($task){
            $projectId = $task->Project_Id;
            $projectName = Project::find($projectId)->Name;   
            return view('tasks.view', compact('projectName', 'task'));
        }else {
            return abort(404);
        }
    }
    


    // ======= destroy =========
  
    public function destroy($id)
{
    Task::find($id)->delete();
    return redirect()->route('tasks.index')->with('success', 'tâche supprimée avec succès');

}




    public function import(Request $request)
    {
    
        $request->validate([
            'tasks' => 'required|mimes:xlsx,xls',
        ]);
    
        $import = new TaskImport;
    
        try {
            $importedRows = Excel::import($import, $request->file('tasks'));
        
            if($importedRows) {
                $successMessage = 'Fichier importé avec succès.';
            } else {
                $successMessage = 'Pas de nouvelles données à importer.';
            }
    
            return redirect('/tasks')->with('success', $successMessage);
        } catch (\Exception $e) {
            // Handle the exception, e.g., log the error or display an error message.
            return redirect('/tasks')->with('error', 'une erreur a été acourd vérifier la syntaxe');
        }
    }
    
    public function export() 
    {
       return Excel::download(new TaskExport, 'Tasks.xlsx');
    }


  
 


   

}
