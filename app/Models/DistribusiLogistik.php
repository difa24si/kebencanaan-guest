<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistribusiLogistik extends Model
{
    protected $table      = 'distribusi_logistik';
    protected $primaryKey = 'distribusi_id';

    protected $fillable = [
        'logistik_id',
        'posko_id',
        'tanggal',
        'jumlah',
        'penerima',
    ];

    public function logistik()
    {
        return $this->belongsTo(LogistikBencana::class, 'logistik_id');
    }

    public function posko()
    {
        return $this->belongsTo(PoskoBencana::class, 'posko_id');
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'distribusi_id')
            ->where('ref_table', 'distribusi_logistik');
    }
}
