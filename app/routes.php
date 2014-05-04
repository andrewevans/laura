<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Route::get('users', 'UsersController@index');
//Route::get('users/{name}', 'UsersController@show');

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('users','UsersController');
Route::resource('sessions','SessionsController');
Route::resource('/','HomeController');
Route::resource('nerds', 'NerdController');
Route::resource('projects', 'ProjectsController');
Route::resource('partnerships', 'PartnershipsController');
Route::resource('costs', 'CostsController');

Route::get('users/{name}', 'UsersController@show');
Route::get('nerds/{name}', 'NerdController@show');

/*
Route::get('/', function()
{
    User::create([
        'username' => 'JeffreyWay',
        'email' => 'jeffrey@laracasts.com',
        'password' => Hash::make('changeme')
    ]);

    return 'Done';
});
*/

Route::get('sessions', function()
{
    return Redirect::to('/admin');
});

Route::get('admin', function()
{
    return 'Admin Page';
})->before('auth');


/*
Route::get('/', function()
{
	return View::make('hello');
});

Route::get('user1', function()
{
    $users = User::find(1);

    return $users;
});

Route::get('people', function()
{
    $people = DB::table('users')->get();

    return $people;

});

Route::get('emails', function()
{
    $emails = DB::table('users')->lists('email');
    return $emails;

});

Route::get('new', function()
{
    $user = new User();
    $user->name = 'Multiplo2';
    $user->email = "multiplo2@aendr.com";
    $user->save();
});

Route::get('update', function()
{
    $user = User::find(2);
    $user->username = 'Updated Name';
    $user->save();

    return User::all();
});

Route::get('delete', function()
{
    $user = User::find(2);
    $user->delete();

    return User::all();
});

Route::get('order', function()
{
    $user = User::orderBy('name','asc')->take(2)->get();

    return $user;
});

Route::get('useaview', function()
{
    $users = User::all();

    return View::make('users.index')->with('users', $users);
});


//Route::get('users'), 'UsersConteroller@index');
*/
