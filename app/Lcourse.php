<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lcourse extends Model
{
    protected $table = 'long_course';

    public function regs()
    {
        return $this->hasOne('App\Regs');
    }
}
