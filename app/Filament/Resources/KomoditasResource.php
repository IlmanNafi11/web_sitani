<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KomoditasResource\Pages;
use App\Filament\Resources\KomoditasResource\RelationManagers;
use App\Models\Komoditas;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KomoditasResource extends Resource
{
    protected static ?string $model = Komoditas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                ->label('Nama Komoditas')
                ->placeholder('Nama komoditas'),
                TextInput::make('musim')
                ->label('Jumlah musim')
                ->placeholder('Jumlah musim dalam satu tahun')
                ->numeric(),
                Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->placeholder('Deskripsi Komoditas')
                ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                ->label('Komoditas')
                ->description(fn ($record) => $record->deskripsi ?? 'Tidak ada deskripsi')
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
            'index' => Pages\ListKomoditas::route('/'),
            'create' => Pages\CreateKomoditas::route('/create'),
            'edit' => Pages\EditKomoditas::route('/{record}/edit'),
        ];
    }
}
