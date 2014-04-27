<?php

class SessionsController extends BaseController {

    public function create()
    {
        if (Auth::check()) return Redirect::to('/admin');
        return View::make('sessions.create');
    }
    public function store()
    {
        if (Auth::attempt(Input::only('email', 'password'))) {
            return 'Welcome ' . Auth::user()->username;
        }
            return Redirect::back()->withInput()->withErrors(array('username' => 'Login field is required.'));
    }

    public function destroy()
    {
        Auth::logout();

        return Redirect::to('login');
    }




}