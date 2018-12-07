<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scourse extends Model
{
    protected $table = 'short_course';
    

    public function regs()
    {
        return $this->hasMany('App\Reg');
    }
    
}
