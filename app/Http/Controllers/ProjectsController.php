<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        //$projects=auth()->user()->projects;
        //sortirani po tome koliko su updatovani
        //$projects = auth()->user()->projects()->orderBy('updated_at', 'desc')->get();
        $projects = auth()->user()->accessibleProjects();
        
        // $projects=Project::all();
        return view('projects.index', compact('projects'));
    }
    public function show(Project $project)
    {
        $this->authorize('update', $project);
        //ovako provera da li je user i owner projekta, red gore je kada se uvedu Policy, rade istu stvar
        /*if(auth()->user()->isNot($project->owner)){
        
            abort(404);
        }*/
        //  $project=Project::findOrFail(request('project'));
        
        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }
    public function store()
    {
        $attributes = $this->validateRequest();
        
        
        /*request()->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'notes' => 'min:3'
            ]
        );*/
        // $attributes['owner_id']=auth()->id;

        $project = auth()->user()->projects()->create($attributes);
        if(request()->has('tasks')){
           //metoda u projectu add tasks
                $project->addTasks(request('tasks'));
            
        }
        if(request()->wantsJson()){
            return ['message'=>$project->path()];
        }
        // Project::create($attributes);
        return redirect($project->path());
    }
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }
    public function update(Project $project)
    {
        $this->authorize('update', $project);
        /*if(auth()->user()->isNot($project->owner)){
        
            abort(404);
        }*/

        //$project->update(request(['notes']));

        // $attributes = request()->validate(
        //     [
        //         'title' => 'required',
        //         'description' => 'required',
        //         'notes' => 'min:3'
        //     ]
        // );

        $attributes = $this->validateRequest();
        $project->update($attributes);
        return redirect($project->path());
    }

    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'notes' => 'nullable'            
        ]);
    }
    public function destroy(Project $project)
    {
        $this->authorize('update',$project);
       $project->delete();
       return redirect('/projects');
    }
}
