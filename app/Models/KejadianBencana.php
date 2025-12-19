<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KejadianBencana extends Model
{
    protected $table = 'kejadian_bencana';
    protected $primaryKey = 'kejadian_id';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'jenis_bencana',
        'tanggal',
        'lokasi_text',
        'rt',
        'rw',
        'dampak',
        'status_kejadian',
        'keterangan',
    ];

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'kejadian_id')
                    ->where('ref_table', 'kejadian_bencana');
    }
}

