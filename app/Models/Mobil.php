<?php


namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;    

class Mobil extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'mobil';

    protected $fillable = ['mesin', 'kapasitas_penumpang', 'tipe'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
