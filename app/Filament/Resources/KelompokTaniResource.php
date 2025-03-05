<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\KelompokTani;
use Filament\Resources\Resource;
use Filament\Pages\Actions\EditAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KelompokTaniResource\Pages;
use App\Filament\Resources\KelompokTaniResource\RelationManagers;
use App\Filament\Resources\KelompokTaniResource\Pages\EditKelompokTani;
use App\Filament\Resources\KelompokTaniResource\Pages\ListKelompokTanis;
use App\Filament\Resources\KelompokTaniResource\Pages\CreateKelompokTani;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Tables\Columns\TextColumn;

class KelompokTaniResource extends Resource
{
    protected static ?string $model = KelompokTani::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Nama Kelompok Tani')
                    ->placeholder('Nama kelompok tani'),
                Select::make('desa_id')
                    ->label('Desa Asal')
                    ->placeholder('Desa asal kelompok tani')
                    ->relationship('desa', 'nama')
                    ->preload()
                    ->searchable(),
                Select::make('kecamatan_id')
                    ->label('Kecamatan Asal')
                    ->placeholder('Kecamatan asal kelompok tani')
                    ->relationship('kecamatan', 'nama')
                    ->preload()
                    ->searchable(),
                Select::make('penyuluh_terdaftar_id')
                    ->label('Penyuluh')
                    ->placeholder('Penyuluh kelompok tani')
                    ->searchable()
                    ->preload()
                    ->relationship('penyuluhTerdaftar', 'nama', function (Builder $query, Get $get) {
                        $kecamatan_id = $get('kecamatan_id');
                        if ($kecamatan_id) {
                            $query->where('kecamatan_id', $kecamatan_id);
                        }
                        return $query;
                    })
                    ->multiple(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Kelompok Tani')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('desa.nama')
                    ->label('Desa')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('kecamatan.nama')
                    ->label('Kecamatan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('penyuluhTerdaftar.nama')
                    ->label('Penyuluh')
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
            'index' => Pages\ListKelompokTanis::route('/'),
            'create' => Pages\CreateKelompokTani::route('/create'),
            'edit' => Pages\EditKelompokTani::route('/{record}/edit'),
        ];
    }
}
