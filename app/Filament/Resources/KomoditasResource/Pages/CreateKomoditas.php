<?php

namespace App\Filament\Resources\KomoditasResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\KomoditasResource;

class CreateKomoditas extends CreateRecord
{
    protected static string $resource = KomoditasResource::class;

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
