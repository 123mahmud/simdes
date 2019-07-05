<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class d_penduduk_masuk extends Model
{
    protected $table = 'd_penduduk_masuk';

	public $incrementing = false;
	public $remember_token = false;
	//public $timestamps = false;
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
}
