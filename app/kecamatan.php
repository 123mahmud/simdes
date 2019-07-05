<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    protected $table = 'kecamatan';

	public $incrementing = false;
	public $remember_token = false;
	//public $timestamps = false;
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
}
