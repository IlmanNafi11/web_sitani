<?php

namespace App\Filament\Resources\BibitBerkualitasResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\BibitBerkualitasResource;

class CreateBibitBerkualitas extends CreateRecord
{
    protected static string $resource = BibitBerkualitasResource::class;

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
