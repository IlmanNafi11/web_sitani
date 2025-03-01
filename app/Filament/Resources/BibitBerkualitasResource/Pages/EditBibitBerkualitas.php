<?php

namespace App\Filament\Resources\BibitBerkualitasResource\Pages;

use App\Filament\Resources\BibitBerkualitasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBibitBerkualitas extends EditRecord
{
    protected static string $resource = BibitBerkualitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
