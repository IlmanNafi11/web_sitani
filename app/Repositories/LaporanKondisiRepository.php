<?php
namespace App\Repositories;

use App\Models\LaporanKondisiLapangan;
use App\Repositories\Interfaces\LaporanInterface;
 class LaporanKondisiRepository implements LaporanInterface{

    public function saveReport(array $data): LaporanKondisiLapangan
    {
        return LaporanKondisiLapangan::create($data);
    }
 }
