<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    public function kurikulum()
    {
    return $this->belongsTo(Kurikulum::class, 'curriculum_id');
    }
}
