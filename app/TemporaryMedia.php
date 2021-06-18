<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporaryMedia extends Model
{
    protected $fillable = [
        'path', 'name'
    ];
}
