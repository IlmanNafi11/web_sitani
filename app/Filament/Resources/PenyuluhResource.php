<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenyuluhResource\Pages;
use App\Filament\Resources\PenyuluhResource\RelationManagers;
use App\Models\Penyuluh;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenyuluhResource extends Resource
{
    protected static ?string $model = Penyuluh::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                ->label('Nama Penyuluh')
                ->relationship('user', 'name', function() {
                    return User::where('role', 'penyuluh');
                })
                ->placeholder('Nama penyuluh')
                ->searchable()
                ->preload(),
                Select::make('kecamatan_id')
                ->label('Kecamatan Penyuluh')
                ->relationship('kecamatan', 'nama')
                ->placeholder('Kecamatan penyuluh')
                ->searchable()
                ->preload()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                ->label('Nama Penyuluh')
                ->searchable()
                ->sortable(),
                TextColumn::make('kecamatan.nama')
                ->label('Kecamatan')
                ->searchable()
                ->sortable()
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
            'index' => Pages\ListPenyuluhs::route('/'),
            'create' => Pages\CreatePenyuluh::route('/create'),
            'edit' => Pages\EditPenyuluh::route('/{record}/edit'),
        ];
    }
}
