<?php


namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Kendaraan extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'kendaraan';

    protected $with = ['motor', 'mobil', 'penjualan'];

    protected $fillable = ['tahun_kendaraan', 'warna'];

    public function motor()
    {
        return $this->hasOne(Motor::class);
    }

    public function mobil()
    {
        return $this->hasOne(Mobil::class);
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
