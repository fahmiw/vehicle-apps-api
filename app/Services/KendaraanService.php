<?php

namespace App\Services;

use App\Repositories\KendaraanRepository;
use Exception;

class KendaraanService
{
    private $kendaraanRepository;

    public function __construct(KendaraanRepository $kendaraanRepository) {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function add($data) {
        try {
            $kendaraan = $this->kendaraanRepository->createKendaraan([
                'tahun_kendaraan' => $data->tahun_kendaraan,
                'warna' => $data->warna
            ]);

            if($data->jenis === '1') {
                $motor = $this->kendaraanRepository->createMotor([
                    'kendaraan_id' => $kendaraan->_id,
                    'mesin' => $data->mesin,
                    'tipe_suspensi' => $data->tipe_suspensi,
                    'tipe_transmisi' => $data->tipe_transmisi
                ]);
            } else if($data->jenis === '2') {
                $mobil = $this->kendaraanRepository->createMobil([
                    'kendaraan_id' => $kendaraan->_id,
                    'mesin' => $data->mesin,
                    'kapasitas_penumpang' => $data->kapasitas_penumpang,
                    'tipe' => $kendaraan->_id,
                ]);
            }

            return response()->json([
                'statusCode' => 200,
                'message' => 'success add data'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "statusCode" => 400,
                "message" => $e->getMessage(),
            ], 400);
        }
    }
    public function getAllKendaraan() {
        try {
            $dataKendaraan = $this->kendaraanRepository->getAll();

            return response()->json([
                "statusCode" => 200,
                "message" => "success get data",
                "data" => $dataKendaraan
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "statusCode" => 400,
                "message" => $e->getMessage(),
            ], 400);
        }
    }

    public function penjualanKendaraan($data)
    {
        try {
            $penjualan = $this->kendaraanRepository->createPenjualan($data);
            return response()->json([
                "statusCode" => 200,
                "message" => "success create data",
                "data" => $penjualan
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "statusCode" => 400,
                "message" => $e->getMessage(),
            ], 400);
        }
    }

    public function getLaporanPenjualan($id)
    {   
        try {
            $laporan = $this->kendaraanRepository->getLaporanPenjualan($id);

            return response()->json([
                "statusCode" => 200,
                "message" => "success get data",
                "data" => $laporan
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "statusCode" => 400,
                "message" => $e->getMessage(),
            ], 400);
        }
    }
}
