<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    protected $table = 'm_item';
    protected $primaryKey = 'i_id';
	public $incrementing = false;

	

	//public $dateFormat = 'Y-m-d H:i:s+';

}
