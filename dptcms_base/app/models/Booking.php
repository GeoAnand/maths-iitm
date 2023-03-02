<?php

class Booking extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'booking';


	protected $fillable = [];

	public function conferencehall()
    {
        return $this->belongsTo('Conferencehall','booking_hall_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('User','booking_user_id', 'id');
    }

}