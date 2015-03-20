<?php


class Task extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tasks';

	# Relationship method...
    public function user() {
    	# many-to-one relationship
	    return $this->belongsTo('User');
    }
}