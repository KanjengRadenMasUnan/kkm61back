<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Paksa Eloquent mengarah ke nama tabel di migration kamu
    protected $table = 'beritas';

    protected $guarded = [];

    protected $casts = [
        'blocks' => 'array',
    ];
}
