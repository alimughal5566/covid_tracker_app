<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{

    protected $with='user';
    protected $fillable=['token','is_covid','date','user_id','gender','age_range','country','no_sym'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
