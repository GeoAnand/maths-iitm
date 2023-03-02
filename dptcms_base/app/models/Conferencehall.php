<?php

class Conferencehall extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'conference_hall';


	protected $fillable = [];

	public function booking()
    {
        return $this->hasMany('Booking','booking_hall_id', 'id');
    }

}