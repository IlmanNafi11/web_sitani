<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenyuluhTerdaftarResource\Pages;
use App\Filament\Resources\PenyuluhTerdaftarResource\RelationManagers;
use App\Models\PenyuluhTerdaftar;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenyuluhTerdaftarResource extends Resource
{
    protected static ?string $model = PenyuluhTerdaftar::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                ->label('Nama')
                ->placeholder('Nama penyuluh'),
                TextInput::make('no_hp')
                ->label('No Hp')
                ->placeholder('No hp penyuluh'),
                TextInput::make('alamat')
                ->label('Alamat')
                ->placeholder('Alamat penyuluh'),
                Select::make('kecamatan_id')
                ->label('Kecamatan')
                ->placeholder('Kecamatan')
                ->relationship('kecamatan', 'nama')
                ->searchable()
                ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                ->label('Nama')
                ->searchable(),
                TextColumn::make('no_hp')
                ->label('No Hp')
                ->searchable(),
                TextColumn::make('alamat')
                ->label('Alamat'),
                TextColumn::make('kecamatan.nama')
                ->label('Kecamatan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->button(),
                DeleteAction::make()
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
            'index' => Pages\ListPenyuluhTerdaftars::route('/'),
            'create' => Pages\CreatePenyuluhTerdaftar::route('/create'),
            'edit' => Pages\EditPenyuluhTerdaftar::route('/{record}/edit'),
        ];
    }
}
