<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ScanHistory extends Model
{
    protected $fillable=['user_id','scan_id','location_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function location()
    {
        return $this->belongsTo(QRScan::class);
    }
}
