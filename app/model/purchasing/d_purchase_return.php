<?php

namespace App\model\purchasing;

use Illuminate\Database\Eloquent\Model;

use App\Lib\format;


use DB;

use Auth;

use Session;


class d_purchase_return extends Model
{  



    protected $table = 'd_purchase_return';
    protected $primaryKey = 'pr_id';
    const CREATED_AT = 'pr_created';
    const UPDATED_AT = 'pr_updated';

}
	
	