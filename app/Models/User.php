<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'username',
        'email',
        'image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts(): HasMany
    {
        return $this->hasMany(UjiTampil::class, 'author_id');
    }

    public function ujiTampils()
    {
        return $this->belongsToMany(UjiTampil::class, 'partisipan_uji_tampil');
    }

    public function mentorings()
    {
    return $this->belongsToMany(Mentoring::class, 'mentoring_user')->withTimestamps();
    }

    public function ujiTampil()
    {
        return $this->belongsToMany(UjiTampil::class, 'partisipan_uji_tampil', 'user_id', 'uji_tampil_id');
    }


}
