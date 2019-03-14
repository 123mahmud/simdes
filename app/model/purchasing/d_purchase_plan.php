<?php

namespace App\model\purchasing;

use Illuminate\Database\Eloquent\Model;

use App\Lib\format;


use DB;

use Auth;

use Session;


class d_purchase_plan extends Model
{  



    protected $table = 'd_purchase_plan';
    protected $primaryKey = 'pp_id';
    const CREATED_AT = 'pp_insert';
    const UPDATED_AT = 'pp_update';

}
	
	