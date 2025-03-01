<?php

namespace App\Filament\Resources\PenyuluhResource\Pages;

use App\Filament\Resources\PenyuluhResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePenyuluh extends CreateRecord
{
    protected static string $resource = PenyuluhResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
