<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use App\Http\Requests\createProjectRequest;

class ProjectController extends Controller
{


    private $projectRepository;
    //

    public function __construct(ProjectRepository $ProjectRepository)
    {
        $this->projectRepository = $ProjectRepository;
    }

    // public function index(){
    //     $projects =  Project::paginate(2);
    //     return view('projects.index', compact('projects'));
    // }

    
    public function index(Request $request)
    {
        $query = $request->input('query');
        $projects = $this->projectRepository->paginate($query);
    
        if ($request->ajax()) {
            return view('projects.projectsTable')->with('projects', $projects);
        } 
        return view('projects.index')->with('projects', $projects);
    }

    //  =========== Create Function ====
    public function create()
    {
        return view('projects.create');
    }

        // ===== store ==========
        public function store(createProjectRequest $request)
        {
    
            $input = $request->all();
            $this->projectRepository->create($input);
            return redirect()->route('projects.index')->with('success', 'projet ajouté avec succès');
        }
        public function edit($id)
        {
            $project = Project::find($id);
            return view('projects.edit', compact('project'));
        }

        public function update(Request $request, $id)
        {     
            $project = Project::find($id);
        
            if (!$project) {
                return redirect()->route('projects.index')->with('error', 'Projet introuvable');
            }

            $request->validate([
                'name' => 'required|unique:projects,name,' . $id,
                'description' => 'nullable|string|max:1000',
            ]);
        
            $input = $request->all();
            $project->update($input);   

            return redirect()->route('projects.index')->with('success', 'Projet mis à jour avec succès');
        }


        public function destroy($id){

            Project::find($id)->delete();
            return redirect()->route('projects.index')->with('success', 'Projet supprimé avec succès');
    
        }

    
}
