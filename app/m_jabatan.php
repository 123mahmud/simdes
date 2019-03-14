<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_jabatan extends Model
{
  protected $table = 'm_jabatan';
  protected $primaryKey = 'c_id';
  protected $fillable = [ 'c_id',
                          'c_code',
                          'c_posisi',
                          'c_isactive'
                        ];

  public $incrementing = false;
  public $remember_token = false;
  //public $timestamps = false;
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
}
