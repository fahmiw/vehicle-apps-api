<?php


namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Motor extends Model
{   
    protected $connection = 'mongodb';
    protected $collection = 'motor';

    protected $fillable = ['kendaraan_id', 'mesin', 'tipe_suspensi', 'tipe_transmisi'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}

