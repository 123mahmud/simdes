<?php

namespace App\model\purchasing;

use Illuminate\Database\Eloquent\Model;



use DB;

use Auth;

use Session;

class d_purchase_order_dt extends Model
{  
    protected $table = 'd_purchase_order_dt';
    const CREATED_AT = 'podt_insert';
    const UPDATED_AT = 'podt_update';
    
}
	
	