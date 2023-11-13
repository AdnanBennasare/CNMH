<?php

namespace App\Http\Controllers;

use Flash;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Repositories\ProjectRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends AppBaseController
{
    /** @var ProjectRepository $projectRepository*/
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->projectRepository = $projectRepo;
    }

    /**
     * Display a listing of the Project.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $projects = $this->projectRepository->paginate($query);

        if ($request->ajax()) {
            return view('projects.table')
                ->with('projects', $projects);
        }

        return view('projects.index')
            ->with('projects', $projects);
    }
   
    /**
     * Show the form for creating a new Project.
     */
   
    /**
     * Store a newly created Project in storage.
     */
    public function store(CreateProjectRequest $request)
    {
        
        $project = new Project(); 
        $this->authorize('create', $project);
        
            $input = $request->all();

            $project = $this->projectRepository->create($input);
    
            Flash::success('Project saved successfully.');
    
            return redirect(route('projects.index'));
     
       
        }
     


    public function create()
    {
        $project = new Project(); 
        $this->authorize('create', $project);
    
            return view('projects.create');
     
       
        }

        
    



    /**
     * Display the specified Project.
     */
    public function show($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        return view('projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified Project.
     */
    public function edit($id)
    {
        
        $project = new Project(); 
        $this->authorize('update', $project);
            $project = $this->projectRepository->find($id);

            if (empty($project)) {
                Flash::error('Project not found');
    
                return redirect(route('projects.index'));
            }
    
            return view('projects.edit')->with('project', $project);
     
        


    
    }

    /**
     * Update the specified Project in storage.
     */
    public function update($id, UpdateProjectRequest $request)
    {
        $project = new Project(); 
        $this->authorize('update', $project);

 
    
            $project = $this->projectRepository->find($id);
    
            if (empty($project)) {
                Flash::error('Project not found');
                return redirect(route('projects.index'));
            }
        
           
        
            $project = $this->projectRepository->update($request->all(), $id);
        
            Flash::success('Project updated successfully.');
        
            return redirect(route('projects.index'));  
       
    }
    

    /**
     * Remove the specified Project from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $project = new Project(); 
        $this->authorize('destroy', $project);

 

        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $this->projectRepository->delete($id);

        Flash::success('Project deleted successfully.');

        return redirect(route('projects.index'));
 
    
}
    
}
