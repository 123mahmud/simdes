<?php

namespace App\model\purchasing;

use Illuminate\Database\Eloquent\Model;



use DB;

use Auth;

use Session;

class d_purchase_return_dt extends Model
{  
    protected $table = 'd_purchase_return_dt';
    const CREATED_AT = 'prdt_created';
    const UPDATED_AT = 'prdt_updated';
    
}
	
	