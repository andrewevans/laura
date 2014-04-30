<?php
// app/models/Partnership.php

class Partnership extends Eloquent
{
    public $timestamp = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partnerships';

    protected $fillable = ['nerd_id','project_id'];


    public static $rules = array(
        'nerd_id'       => 'required|numeric',
        'project_id'       => 'required|numeric',
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