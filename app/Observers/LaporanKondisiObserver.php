<?php

namespace App\Observers;

use App\Models\LaporanKondisiLapangan;
use App\Models\LaporanKondisiLapanganDetail;

class LaporanKondisiObserver
{

    public function creating(LaporanKondisiLapangan $laporanKondisiLapangan): void
    {

    }

    /**
     * Handle the LaporanKondisiLapangan "created" event.
     */
    public function created(LaporanKondisiLapangan $laporanKondisiLapangan):void
    {
        if (request()->hasFile('foto_bibit')) {
            $data = request()->all();
            $file = $data['foto_bibit'];
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('foto_bibit/' . $data['kelompok_tani_id'], $filename, 'public');
            LaporanKondisiLapanganDetail::create([
                'laporan_kondisi_id' => $laporanKondisiLapangan->id,
                'luas_lahan' => $data['luas_lahan'],
                'estimasi_panen' => $data['estimasi_panen'],
                'jenis_bibit' => $data['jenis_bibit'],
                'foto_bibit' => $path,
                'lokasi_lahan' => $data['lokasi_lahan'],
            ]);
        }

    }

    /**
     * Handle the LaporanKondisiLapangan "updated" event.
     */
    public function updated(LaporanKondisiLapangan $laporanKondisiLapangan): void
    {
        //
    }

    /**
     * Handle the LaporanKondisiLapangan "deleted" event.
     */
    public function deleted(LaporanKondisiLapangan $laporanKondisiLapangan): void
    {
        //
    }

    /**
     * Handle the LaporanKondisiLapangan "restored" event.
     */
    public function restored(LaporanKondisiLapangan $laporanKondisiLapangan): void
    {
        //
    }

    /**
     * Handle the LaporanKondisiLapangan "force deleted" event.
     */
    public function forceDeleted(LaporanKondisiLapangan $laporanKondisiLapangan): void
    {
        //
    }
}
