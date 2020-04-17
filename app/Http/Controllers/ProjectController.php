<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;

class ProjectController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get projects
        $projects = Project::Paginate(15);
        //Return projects as collection
        return ProjectResource::collection($projects);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $newProject = new Project();

        $newProject->project_name = $request->input('project_name');
        $newProject->project_owner = $request->input('project_owner');
        $newProject->project_location= $request->input('project_location');
        $newProject->commencement_date = $request->input('commencement_date');
        $newProject->closing_date = $request->input('closing_date');
        $newProject->next_of_kin_phone_number = $request->input('next_of_kin_phone_number');
        $newProject->contract_details = $request->input('contract_details');



        if($newProject->save()){
            return new ProjectResource($newProject);
        } 



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {

        $project->project_name = $request->input('project_name');
        $project->project_owner = $request->input('project_owner');
        $project->project_location= $request->input('project_location');
        $project->commencement_date = $request->input('commencement_date');
        $project->closing_date = $request->input('closing_date');
        $project->next_of_kin_phone_number = $request->input('next_of_kin_phone_number');
        $project->contract_details = $request->input('contract_details');



        if($project->update()){

            return new ProjectResource($project);
        }


}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->delete()){

            return response()->json(["message" => "Project record has been deleted!"]);
        }
    }
}
