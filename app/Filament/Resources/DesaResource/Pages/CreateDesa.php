<?php

namespace App\Filament\Resources\DesaResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use App\Filament\Resources\DesaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDesa extends CreateRecord
{
    protected static string $resource = DesaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['nama'] = Str::title($data['nama']);

        return $data;
    }
}
