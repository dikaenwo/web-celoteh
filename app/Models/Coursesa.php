<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coursesa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'courses';
    public function category() :BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function kurikulum() : HasMany{
        return $this->hasMany(kurikulum::class, 'course_id');
    }
}
