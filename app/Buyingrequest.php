<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyingrequest extends Model
{
	protected $fillable = ['deskripsi','image','email','phone','expired','deadline'];
}
