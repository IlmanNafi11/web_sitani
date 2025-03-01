<?php

namespace App\Filament\Resources\KelompokTaniResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\KelompokTaniResource;

class CreateKelompokTani extends CreateRecord
{
    protected static string $resource = KelompokTaniResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['nama'] = Str::title($data['nama']);

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
