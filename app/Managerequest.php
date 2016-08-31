<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Managerequest extends Model
{
	protected $fillable = ['deskripsi','deadline','comment','request_id'];

	public function Buyingrequest()
	{
		return $this->belongsTo('App\Buyingrequest','request_id');
	}	
}
