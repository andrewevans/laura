<?php

class NerdController extends \BaseController {

    protected $nerd;
    protected $projects;

    public function __construct(Nerd $nerd)
    {
        $this->nerd = $nerd;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $nerds = $this->nerd->all();

        // get all the nerds
        ///$nerds = Nerd::all();

        // load the view and pass the nerds
        return View::make('nerds.index')
            ->with('nerds', $nerds);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        // load the create form (app/views/nerds/create.blade.php)
        return View::make('nerds.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();

        if ( ! $this->nerd->fill($input)->isValid())
        {
            return Redirect::back()->withInput()->withErrors($this->nerd->errors);
        }

        // store
        $nerd = new Nerd;
        $nerd->name       = Input::get('name');
        $nerd->email      = Input::get('email');
        $nerd->nerd_level = Input::get('nerd_level');
        $nerd->slug       = $nerd->url_slug(Input::get('slug'));
        $nerd->save();

        // redirect
        Session::flash('message', 'Successfully created nerd!');
        return Redirect::to('nerds');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $slug
	 * @return Response
	 */
	public function show($slug)
	{
        if (! is_numeric($slug)) {
            $nerd = Nerd::whereSlug($slug)->first();
            return View::make('nerds.show', ['nerd' => $nerd]);
        }

        // get the nerd
        $nerd = Nerd::find($slug);

        Session::flash('message', 'You were forwarded here from ' . '<b>nerds/' . $slug . '</b>');
        return Redirect::to('nerds/' . $nerd->slug);
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
        $nerd = Nerd::find($id);
        $all_projects = Project::all();
        $project_options = Project::lists('name','id');

        $partnerships = array();

        foreach ($nerd->projects as $partnership) {
            $partnerships[] = $partnership->id;
        }

        // show the edit form and pass the nerd
        return View::make('nerds.edit')
            ->with('nerd', $nerd)
            ->with('project_options', $project_options)
            ->with('all_projects', $all_projects)
            ->with('partnerships', $partnerships);
    }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $nerd = Nerd::whereId($id)->first();

        $input = Input::all();

        if ( ! $this->nerd->fill($input)->isValid($id))
        {
            return Redirect::back()->withInput()->withErrors($this->nerd->errors);
        }

        // store
        //$nerd = Nerd::find($id);
        $nerd->name       = Input::get('name');
        $nerd->email      = Input::get('email');
        $nerd->nerd_level = Input::get('nerd_level');
        $nerd->slug       = $nerd->url_slug(Input::get('slug'));
        if ( ! is_array(Input::get('project'))) {
            $project = array();
        } else {
            $project = Input::get('project');
        }
        $nerd->projects()->sync($project);
        $nerd->save();

        // redirect
        Session::flash('message', 'Successfully updated nerd!');
        return Redirect::to('nerds');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        // delete
        $nerd = Nerd::find($id);
        $nerd->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the nerd!');
        return Redirect::to('nerds');
    }


}
