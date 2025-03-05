<?php

namespace App\Filament\Resources\PenyuluhTerdaftarResource\Pages;

use App\Filament\Resources\PenyuluhTerdaftarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenyuluhTerdaftars extends ListRecords
{
    protected static string $resource = PenyuluhTerdaftarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
