<?php
// app/models/Nerd.php

class Nerd extends Eloquent
{
    public $timestamp = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nerds';

    protected $fillable = ['name','email','password','nerd_level'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    public static $rules = array(
        'name'       => 'required',
        'email'      => 'required|email',
        'nerd_level' => 'required|numeric'
    );

    public static $messages = [
        'name.required' => "A NAME is required. How else?!",
        'email.required' => "An EMAIL is required",
        'email.email' => "That's not an EMAIL! Try a well-formed email.",
//        'email.email' => "That's not an EMAIL! Try a well-formed email.",
    ];

    public function isValid()
    {
        $validation = Validator::make($this->attributes, static::$rules,  static::$messages);

        if ($validation->passes()) return true;

        $this->errors = $validation->messages();
        return false;
    }

    public function projects()
    {
        return $this->belongsToMany('Project','partnerships');
    }


}