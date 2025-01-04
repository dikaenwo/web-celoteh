<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class kurikulum extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function lesson() : HasMany{
        return $this->hasMany(Lesson::class, 'curriculum_id');
    }

    public function course()
    {
    return $this->belongsTo(Coursesa::class);
    }
}
