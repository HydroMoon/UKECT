<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regs extends Model
{
    protected $table = 'reg_l_course';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lcourse()
    {
        return $this->belongsTo('App\Lcourse');
    }
}
