<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use App\Models\Motor;
use App\Models\Mobil;
use App\Models\Penjualan;

class KendaraanRepository
{
    public function getAll() {
        return Kendaraan::all();
    }

    public function createPenjualan($data) {
        return Penjualan::create($data);
    }

    public function getLaporanPenjualan($id) {
        return Kendaraan::findOrFail($id)->penjualan;
    }

    public function createKendaraan($data) {
        return Kendaraan::create($data);
    }

    public function createMobil($data) {
        return Mobil::create($data);
    }

    public function createMotor($data) {
        return Motor::create($data);
    }
}
