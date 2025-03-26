<?php

namespace App\Filament\Resources\LaporanKondisiLapanganResource\Pages;

use App\Filament\Resources\LaporanKondisiLapanganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaporanKondisiLapangans extends ListRecords
{
    protected static string $resource = LaporanKondisiLapanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
