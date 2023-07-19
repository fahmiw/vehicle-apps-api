<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\KendaraanService;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    private $kendaraanService;

    public function __construct(KendaraanService $kendaraanService)
    {
        $this->kendaraanService = $kendaraanService;
    }

    public function addKendaraan(Request $request) {
        return $this->kendaraanService->add($request);
    }

    public function stokKendaraan()
    {
        return $this->kendaraanService->getAllKendaraan();
    }

    public function penjualan(Request $request)
    {
        return $this->kendaraanService->penjualanKendaraan($request->all());
    }

    public function laporanPenjualan($id)
    {
        return $this->kendaraanService->getLaporanPenjualan($id);
    }
}
