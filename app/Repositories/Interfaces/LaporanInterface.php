<?php

namespace App\Repositories\Interfaces;

use App\Models\LaporanKondisiLapangan;

interface LaporanInterface
{
    /**
     * Menyimpan laporan kedalam database
     * @param array $data data laporan
     * @return LaporanKondisiLapangan
     */
    public function saveReport(array $data): LaporanKondisiLapangan;
}
