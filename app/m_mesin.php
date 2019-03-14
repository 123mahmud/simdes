<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_mesin extends Model
{
	protected $table = 'm_mesin';
	protected $primaryKey = 'm_id';
	protected $fillable = [ 'm_id',
							'm_code',
							'm_nama',
							'm_pegawai'
		                    ];

	public $incrementing = false;
	public $remember_token = false;
	//public $timestamps = false;
	const CREATED_AT = 'm_created';
	const UPDATED_AT = 'm_updated';
}
