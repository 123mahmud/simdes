<?php

namespace App\model\master;

use Illuminate\Database\Eloquent\Model;
use DB;
use Response;
use Datatables;
use Session;

class m_supplier extends Model
{
    protected $table = 'm_supplier';  
    protected $primaryKey = 's_id';
    const CREATED_AT = 's_created';
    const UPDATED_AT = 's_updated';

    public function find_data($req) {

      // Keyword yang diberikan oleh user
      $keyword = $req->keyword;  
      $keyword = $keyword != null ? $keyword : '';

      DB::enableQueryLog();
      $data = $this->orderBy('s_name')->take(10);
      
      if($keyword != '' ) {
          $data = $data->where('s_name', 'LIKE', DB::raw("'%$keyword%'"));
      }

      $data = $data->select('s_id', 's_company', 's_name', 's_address', 's_phone', 's_fax', 's_note')->get();
      $res = array('data' => $data);
      return $res;
    } 
}
