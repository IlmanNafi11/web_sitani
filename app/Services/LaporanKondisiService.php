<?php
namespace App\Services;

use App\Models\LaporanKondisiLapangan;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\LaporanInterface;

class LaporanKondisiService{
    protected LaporanInterface $laporanInterface;
    protected LaporanKondisiLapangan $laporanKondisiModel;

    public function __construct(LaporanInterface $laporanInterface)
    {
        $this->laporanInterface = $laporanInterface;
    }

    public function saveLaporan(array $data)
    {
        return $this->laporanInterface->saveReport($data);
    }

}
