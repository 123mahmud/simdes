<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    protected $table = 'provinsi';

	public $incrementing = false;
	public $remember_token = false;
	//public $timestamps = false;
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
}
