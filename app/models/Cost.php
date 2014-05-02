<?php

class Cost extends Eloquent {

    public $timestamp = false;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'costs';

    protected $fillable = ['title','amount','description'];

}
