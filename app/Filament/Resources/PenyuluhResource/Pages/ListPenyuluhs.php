<?php

namespace App\Filament\Resources\PenyuluhResource\Pages;

use App\Filament\Resources\PenyuluhResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenyuluhs extends ListRecords
{
    protected static string $resource = PenyuluhResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
