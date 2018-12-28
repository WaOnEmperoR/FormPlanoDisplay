<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PDFFile extends Model
{
    protected $fillable = [
		'province_id', 'regency_id', 'district_id', 'subdistrict_id', 'file_path', 'tps_num', 'c1_plano_type',
	];

	protected $primaryKey = 'id';
}
