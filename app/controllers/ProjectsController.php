<?php

class ProjectsController extends \BaseController {

    protected $project;
    protected $project_details;

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
        $project_details = ProjectDetail::all();

        // load the view and pass the nerds
        return View::make('projects.index')
            ->with('projects', $projects)
            ->with('project_details', $project_details);

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
        $project->name       = trim(strip_tags(Input::get('name')));
        $project->cost      = Input::get('cost');
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
        $project_details = ProjectDetail::whereProjectId($id)->get();

        // show the view and pass the nerd to it
        return View::make('projects.show')
            ->with('project', $projects)
            ->with('project_details', $project_details);
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
        $project_details = ProjectDetail::whereProjectId($id)->get();

        // show the edit form and pass the nerd
        return View::make('projects.edit')
            ->with('project', $project)
            ->with('project_details', $project_details)
            ->nest('project_details_create', 'project_details.create');
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
        $project_details = ProjectDetail::whereProjectId($id)->get();

        $input = Input::all();

        if ( ! $this->project->fill($input)->isValid())
        {
            return Redirect::back()->withInput()->withErrors($this->project->errors);
        }

        // store
        $project->name       = trim(strip_tags(Input::get('name')));
        $project->cost      = Input::get('cost');

        $project_detail = Input::get('project_detail');

        if (Input::get('project_detail_new')['title'] != '' || Input::get('project_detail_new')['description'] != '') {
            $project_detail[] = Input::get('project_detail_new');
            $this->project_detail_create($id, $project_details, $project_detail);
        }

        if ( ! $this->project_detail_update($id, $project_details, $project_detail)) {
            return Redirect::back()->withInput()->withErrors($this->project->errors);
        }

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

    public function project_detail_create($id, $project_details, $project_detail)
    {
        $project_details[] = new ProjectDetail;

        return $project_details;
    }


    public function project_detail_update($id, $project_details, $project_detail)
    {
        for ($key = 0; $key < count($project_detail); $key++) {
            $project_details[$key]->project_id = $id;
            $project_details[$key]->title = trim(strip_tags($project_detail[$key]['title']));
            $project_details[$key]->description = $project_detail[$key]['description'];
        }

        foreach ($project_details as $key => $description) {

            if ( ! $project_details[$key]->isValid($key)) {
                $this->project->errors = $project_details[$key]->errors;
                return false;
            }

            $project_details[$key]->save();
        }

        return $project_details;
    }


}
