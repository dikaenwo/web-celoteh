<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UjiTampil extends Model
{
    use HasFactory;

    protected $fillable = ['judul_presentasi', 'nama', 'tanggal_presentasi', 'deskripsi', 'image', 'zoom_link', 'jam_tampil', 'unique_code', 'author_id'];

    public function author():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'partisipan_uji_tampil');
    }
}
