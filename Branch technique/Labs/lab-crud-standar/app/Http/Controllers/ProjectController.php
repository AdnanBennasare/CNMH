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

    
}
