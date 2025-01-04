<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsedCode extends Model
{
    use HasFactory;
    protected $table = 'kode_reedem';
    protected $fillable = [
        'user_id',
        'unique_code',
    ];
}
