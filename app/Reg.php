<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reg extends Model
{
    protected $table = 'reg_course';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scourse()
    {
        return $this->belongsTo('App\Scourse');
    }
}
