<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class d_penduduk extends Model
{
  protected $table = 'd_penduduk';
  protected $primaryKey = 'p_id';
  protected $fillable = [ 	'c_id',
                          	'p_id',
							'p_nik',
							'p_nama',
							'p_urut_kk',
							'p_kelamin',
							'p_tempat_lahir',
							'p_tgl_lahir',
							'p_gol_darah',
							'p_agama',
							'p_status_nikah',
							'p_status_keluarga',
							'p_pendidikan',
							'p_pekerjaan',
							'p_nama_ibu',
							'p_nama_ayah',
							'p_no_kk',
							'p_rt',
							'p_rw',
							'p_warga_negara'
                        ];

  public $incrementing = false;
  public $remember_token = false;
  //public $timestamps = false;
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
}
