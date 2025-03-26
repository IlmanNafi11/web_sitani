<?php
namespace App\Repositories;

use App\Models\LaporanKondisiLapangan;
use App\Models\LaporanKondisiLapanganDetail;
use App\Repositories\Interfaces\LaporanInterface;
 class LaporanKondisiRepository implements LaporanInterface{

    public function saveReport(array $data): LaporanKondisiLapangan
    {
        return LaporanKondisiLapangan::create([
            'kelompok_tani_id' => $data['kelompok_tani_id'],
            'komoditas_id' => $data['komoditas_id'],
            'penyuluh_id' => $data['penyuluh_id'],
        ]);
    }
 }
