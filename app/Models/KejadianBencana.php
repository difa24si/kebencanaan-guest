<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KejadianBencana extends Model
{
    use HasFactory;

    protected $table = 'kejadian_bencana';

    protected $fillable = [
        'nama_bencana',
        'lokasi',
        'tanggal',
    ];
}
