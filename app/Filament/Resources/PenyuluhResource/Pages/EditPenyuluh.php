<?php

namespace App\Filament\Resources\PenyuluhResource\Pages;

use App\Filament\Resources\PenyuluhResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenyuluh extends EditRecord
{
    protected static string $resource = PenyuluhResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
