<?php

class Eventcategory extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'events_type';


	protected $fillable = [];

	public function events()
    {
        return $this->hasOne('Events','events_type_id', 'id');
    }

}