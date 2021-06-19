<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['id'];

    public function quizzable()
    {
        return $this->belongsTo(config('quiz.quizzable_model'), 'course_id');
    }

    public function questions(): ?HasMany
    {
        return $this->hasMany(Question::class);
    }
}