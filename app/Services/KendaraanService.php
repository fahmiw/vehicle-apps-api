<?php

namespace App\Services;

use App\Repositories\KendaraanRepository;

class KendaraanService
{
    private $kendaraanRepository;

    public function __construct(KendaraanRepository $kendaraanRepository) {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function getAllKendaraan() {
        return $this->kendaraanRepository->getAll();
    }

    public function penjualanKendaraan($data)
    {
        // Validasi dan proses penjualan kendaraan di sini

        return $this->kendaraanRepository->createPenjualan($data);
    }

    public function getLaporanPenjualan($id)
    {
        return $this->kendaraanRepository->getLaporanPenjualan($id);
    }
}
