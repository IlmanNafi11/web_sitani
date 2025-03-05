<?php

namespace App\Filament\Resources\LaporanKondisiLapanganResource\Pages;

use App\Filament\Resources\LaporanKondisiLapanganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporanKondisiLapangan extends EditRecord
{
    protected static string $resource = LaporanKondisiLapanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
