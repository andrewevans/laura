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
        'cost.required' => "You need a cost. No free lunches.",
//        'email.email' => "That's not an EMAIL! Try a well-formed email.",
    ];

    public function isValid()
    {
        $validation = Validator::make(
            array(
                'name' => $this->attributes['name'],
                'cost' => $this->attributes['cost'],
            ),
            array(
                'name' => 'required',
                'cost' => 'required|numeric|min:0',
            ),
            static::$messages
        );

        if ($validation->passes()) return true;

        $this->errors = $validation->messages();
        return false;
    }

    public function nerds()
    {
        return $this->belongsToMany('Nerd','partnerships');
    }


    public function project_details()
    {
        return $this->hasMany('ProjectDetail', 'project_details','project_id');
    }


}