<?php
// app/models/ProjectDetail.php

class ProjectDetail extends Eloquent
{
    public $timestamp = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'project_details';

    protected $fillable = ['project_id','title','description'];


    public static $rules = array(
        'project_id'       => 'required|numeric',
        'title'       => 'required',
        'description'       => 'required',
    );

    public static $messages = [
        'title.required' => "You must enter a title. At least one of the title is missing.",
        'description.required' => "You must enter a description. At least one of the descriptions is missing.",
    ];


    public function project()
    {
        return $this->belongsTo('Project');
    }


    public function isValid($key = null)
    {
        $validation = Validator::make(
            $this->attributes,
            static::$rules,
            static::$messages
        );

        if ($validation->passes()) return true;

        $this->errors = $validation->messages();
        return false;
    }

}