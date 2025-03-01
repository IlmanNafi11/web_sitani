<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BibitBerkualitasResource\Pages;
use App\Filament\Resources\BibitBerkualitasResource\RelationManagers;
use App\Models\BibitBerkualitas;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BibitBerkualitasResource extends Resource
{
    protected static ?string $model = BibitBerkualitas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                ->label('Nama Bibit')
                ->placeholder('Nama bibit'),
                Select::make('komoditas_id')
                ->label('Komoditas')
                ->placeholder('Komoditas bibit')
                ->searchable()
                ->preload()
                ->relationship('komoditas', 'nama'),
                Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->placeholder('Deskripsi bibit')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                ->label('Bibit')
                ->description(fn($record) => $record->deskripsi ?? 'Tidak ada deskripsi')
                ->searchable(),
                TextColumn::make('komoditas.nama')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->button(),
                Tables\Actions\DeleteAction::make()
                ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBibitBerkualitas::route('/'),
            'create' => Pages\CreateBibitBerkualitas::route('/create'),
            'edit' => Pages\EditBibitBerkualitas::route('/{record}/edit'),
        ];
    }
}
