<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemajuan extends Model
{
    use HasFactory;
    protected $table = 'history';
    protected $fillable = [
        'user_id',
        'session_name',
        'gesture_score',
        'expression_score',
        'vocal_quality_score',
        'gesture_feedback',
        'expression_feedback',
        'vocal_quality_feedback',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
