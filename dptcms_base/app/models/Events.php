<?php

class Events extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'events';


	protected $fillable = [];

	public function eventcategory()
    {
        return $this->hasOne('Eventcategory','id','events_type_id');
    }

}