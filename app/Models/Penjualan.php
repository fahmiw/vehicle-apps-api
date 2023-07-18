<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Penjualan extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'penjualan';

    protected $fillable = ['kendaraan_id', 'tanggal_penjualan', 'harga_penjualan'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
