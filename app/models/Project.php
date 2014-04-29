<?php
// app/models/Project.php

class Project extends Eloquent
{
    public $timestamp = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

    protected $fillable = ['name','cost', 'description'];


    public static $rules = array(
        'name'       => 'required',
        'cost'      => 'required|min:0',
    );

    public static $messages = [
//        'email.email' => "That's not an EMAIL! Try a well-formed email.",
    ];

    /*
    public function isValid()
    {
        $validation = Validator::make($this->attributes, static::$rules,  static::$messages);

        if ($validation->passes()) return true;

        $this->errors = $validation->messages();
        return false;
    }
    */

}