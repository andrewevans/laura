<?php

class UsersController extends \BaseController {

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = $this->user->all();

        return View::make('users/index')->with('users', $users);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();

        if ( ! $this->user->fill($input)->isValid())
        {
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }

        $user = new User;
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password')); // If you want passwords one way hashed
        $user->save();

        return Redirect::route('people.users.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($username)
	{
        $user = User::whereUsername($username)->first();

        return View::make('users.show', ['user' => $user]);

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
        $user = User::find($id);

        // show the edit form and pass the nerd
        return View::make('users.edit')
            ->with('user', $user);

    }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $username
	 * @return Response
	 */
	public function update($username)
	{
		//
        $user = User::whereUsername($username)->first();

        $input = Input::all();

        //$user = User::find($id);

        if ( ! $this->user->fill($input)->isValid())
        {
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }

//        $user->username = $input['username'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);

        $user->save();

        return View::make('users.show', ['user' => $user]);
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
