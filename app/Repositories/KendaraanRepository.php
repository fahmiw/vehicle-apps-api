<?php

namespace App\Repositories;

use App\Models\Kendaraan;
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
}
