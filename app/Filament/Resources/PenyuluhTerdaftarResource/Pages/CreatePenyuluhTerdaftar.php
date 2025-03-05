<?php

namespace App\Filament\Resources\PenyuluhTerdaftarResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PenyuluhTerdaftarResource;

class CreatePenyuluhTerdaftar extends CreateRecord
{
    protected static string $resource = PenyuluhTerdaftarResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['nama'] = Str::title($data['nama']);

        return $data;
    }
}
