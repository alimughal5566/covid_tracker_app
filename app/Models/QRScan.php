<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QRScan extends Model
{
protected $fillable=['location_id','token','user_id','location_name','scan_id' ];
}
