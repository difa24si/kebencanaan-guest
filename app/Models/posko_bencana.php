<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class posko_bencana extends Model
{
      protected $table = 'posko_bencana';
      protected $primaryKey = 'posko_id';
      protected $fillable = [
        'kejadian_id',
        'nama',
        'alamat',
        'kontak',
        'penanggung_jawab'
    ];
}
