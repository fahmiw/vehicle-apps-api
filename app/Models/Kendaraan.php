<?php


namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Kendaraan extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'kendaraan';

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

class Motor extends Model
{
    protected $fillable = ['mesin', 'tipe_suspensi', 'tipe_transmisi'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}

class Mobil extends Model
{
    protected $fillable = ['mesin', 'kapasitas_penumpang', 'tipe'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}

class Penjualan extends Model
{
    protected $fillable = ['kendaraan_id', 'tanggal_penjualan', 'harga_penjualan'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
