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

    public function stokKendaraan()
    {
        return $this->kendaraanService->getAllKendaraan();
    }

    public function penjualan(Request $request)
    {
        // Validasi input request di sini

        $penjualan = $this->kendaraanService->penjualanKendaraan($request->all());
        return response()->json($penjualan, 201);
    }

    public function laporanPenjualan($id)
    {
        $laporan = $this->kendaraanService->getLaporanPenjualan($id);
        return response()->json($laporan);
    }
}
