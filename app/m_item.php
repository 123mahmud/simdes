<?php

namespace App\model\master;

use Illuminate\Database\Eloquent\Model;

use DB;
use Response;
use Datatables;
use Session;

class m_item extends Model {
    protected $table = 'm_item';  
    protected $primaryKey = 'i_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public static function find_data($req) {
      $keyword = $req->term;
      $keyword = $keyword != null ? $keyword : '';
      $i_type = $req->i_type;
      $i_type = $i_type != null ? $i_type : '';
      $gudang = $req->gudang;
      $gudang = $gudang != null ? $gudang : 1;

      $m_item = m_itemm::leftJoin('m_satuan', 'i_satuan', '=', 's_id');
      if($keyword != '') {
         $m_item = $m_item->where([['i_name', 'LIKE', DB::raw("'%$keyword%'")]]);
      }
      if($i_type != '') {
         $m_item = $m_item->where('i_type', $i_type);
      }

      $m_item = $m_item->select('i_id', 'i_code', 'i_type', 'i_code_group', 'i_name', 'i_sat1', 'i_sat2', 'i_sat3', 'i_sat_isi1', 'i_sat_isi2', 'i_min_stock', DB::raw("(SELECT s_name FROM m_satuan WHERE s_id = m_item.i_sat2) AS i_sat2_label"),  DB::raw("(SELECT s_name FROM m_satuan WHERE s_id = m_item.i_sat3) AS i_sat3_label"),  DB::raw("(SELECT s_name FROM m_satuan WHERE s_id = m_item.i_sat_isi1) AS i_sat_isi1_label"), DB::raw('IFNULL((SELECT s_qty FROM d_stock WHERE s_item = m_item.i_id AND s_position = $gudang), 0) AS s_qty'));

      $res = [
        'm_item' => $m_item->get()
      ];
      
      return response()->json($res);
    }
}
