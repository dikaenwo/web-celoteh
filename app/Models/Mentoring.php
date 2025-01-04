<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentoring extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kelas',
        'cover',
        'jam_mulai',
        'jam_berakhir',
        'tanggal_mulai',
        'jadwal',
        'deskripsi',
        'bidang_kelas',
        'nama_mentor',
    ];

    public function users()
    {
    return $this->belongsToMany(User::class, 'mentoring_user')->withTimestamps();
    }

}
