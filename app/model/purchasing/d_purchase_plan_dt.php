<?php

namespace App\model\purchasing;

use Illuminate\Database\Eloquent\Model;

use App\Lib\format;


use DB;

use Auth;

use Session;

class d_purchase_plan_dt extends Model
{  
    protected $table = 'd_purchase_plan_dt';
    const CREATED_AT = 'ppdt_insert';
    const UPDATED_AT = 'ppdt_update';
    
}
	
	