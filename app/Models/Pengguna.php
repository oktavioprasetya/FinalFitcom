<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'penggunas';

    protected $fillable = [
        'nama',
        'email',
        'no_telepon',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];
public function pengguna()
{
    return $this->belongsTo(Pengguna::class, 'pengguna_id');
}
}