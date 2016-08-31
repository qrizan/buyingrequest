<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyingrequest extends Model
{
	protected $fillable = ['deskripsi','image','email','phone','expired','deadline','status'];

	public function managerequests()
	{
		return $this->hasMany('App\Managerequest');
	}		
}
