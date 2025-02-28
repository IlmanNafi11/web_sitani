<?php

namespace App\Filament\Resources\KecamatanResource\Pages;

use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\KecamatanResource;

class CreateKecamatan extends CreateRecord
{
    protected static string $resource = KecamatanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['nama'] = Str::title($data['nama']);

        return $data;
    }

    protected static ?string $title = "Tambah Kecamatan";

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
