<?php

class ProjectsController extends \BaseController {

    protected $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $projects = $this->project->all();

        // load the view and pass the nerds
        return View::make('projects.index')
            ->with('projects', $projects);

    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make('projects.create');

    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();

        if ( ! $this->project->fill($input)->isValid())
        {
            return Redirect::back()->withInput()->withErrors($this->project->errors);
        }
            // store
            $project = new Project;
            $project->name       = Input::get('name');
            $project->cost      = Input::get('cost');
            $project->description = Input::get('description');
            $project->save();

            // redirect
            Session::flash('message', 'Successfully created PROJECT!');
            return Redirect::to('projects');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        // get the nerd
        $projects = Project::find($id);

        // show the view and pass the nerd to it
        return View::make('projects.show')
            ->with('project', $projects);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        // get the nerd
        $project = Project::find($id);

        // show the edit form and pass the nerd
        return View::make('projects.edit')
            ->with('project', $project);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $project = Project::whereId($id)->first();

        $input = Input::all();

        if ( ! $this->project->fill($input)->isValid())
        {
            return Redirect::back()->withInput()->withErrors($this->project->errors);
        }

        // store
        //$nerd = Nerd::find($id);
        $project->name       = Input::get('name');
        $project->cost      = Input::get('cost');
        $project->description = Input::get('description');
        $project->save();

        // redirect
        Session::flash('message', 'Successfully updated PROJECT!');
        return Redirect::to('projects');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
