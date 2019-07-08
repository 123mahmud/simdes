<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class d_pindah_rt extends Model
{
    protected $table = 'd_pindah_rt';

	  public $incrementing = false;
	  public $remember_token = false;
	  //public $timestamps = false;
	  const CREATED_AT = 'created_at';
	  const UPDATED_AT = 'updated_at';
}
