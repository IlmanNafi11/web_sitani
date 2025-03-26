<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\LaporanKondisiLapangan;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LaporanKondisiLapanganResource\Pages;
use App\Filament\Resources\LaporanKondisiLapanganResource\RelationManagers;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\Tabs\Tab;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;

class LaporanKondisiLapanganResource extends Resource
{
    protected static ?string $model = LaporanKondisiLapangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kelompokTani.nama')
                    ->label('Kelompok Tani')
                    ->searchable(),
                TextColumn::make('penyuluh.penyuluhTerdaftar.nama')
                    ->label('Pelapor')
                    ->searchable(),
                TextColumn::make('laporanKondisiLapanganDetail.luas_lahan')
                    ->label('Luas Lahan/Ha')
                    ->sortable(),
                TextColumn::make('laporanKondisiLapanganDetail.jenis_bibit')
                    ->label('Bibit')
                    ->searchable(),
                TextColumn::make('laporanKondisiLapanganDetail.estimasi_panen')
                    ->label('Estimasi Panen')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->badge()
                    ->color(function ($record) {
                        switch ($record->status) {
                            case 'tidak berkualitas':
                                return 'danger';
                            case 'berkualitas':
                                return 'success';
                            default:
                                return 'warning';
                        }
                    })
                    ->icon(fn($record) => match ($record->status) {
                        'tidak berkualitas' => 'iconpark-badtwo-o',
                        'berkualitas' => 'iconpark-goodtwo-o',
                        default => 'heroicon-o-clock',
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('berkualitas')
                        ->label('Berkualitas')
                        ->color('success')
                        ->action(function (LaporanKondisiLapangan $record) {
                            $record->update(['status' => 'berkualitas']);
                        })
                        ->icon('iconpark-goodtwo-o'),
                    Action::make('tidak_berkualitas')
                        ->label('Tidak Berkualitas')
                        ->color('danger')
                        ->action(function (LaporanKondisiLapangan $record) {
                            $record->update(['status' => 'tidak berkualitas']);
                        })
                        ->icon('iconpark-badtwo-o'),
                ])
                    ->button()
                    ->label('Perbarui Status'),
                ActionGroup::make([
                    ViewAction::make('view')
                        ->label('Lihat'),
                    DeleteAction::make()
                        ->label('Hapus'),
                ])
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
            'index' => Pages\ListLaporanKondisiLapangans::route('/'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('Laporan Detail')
                            ->schema([
                                Group::make([
                                    TextEntry::make('kelompokTani.nama')
                                        ->label('Kelompok Tani'),
                                    TextEntry::make('penyuluh.penyuluhTerdaftar.nama')
                                        ->label('Pelapor'),
                                    TextEntry::make('laporanKondisiLapanganDetail.luas_lahan')
                                        ->label('Luas Lahan/Ha'),
                                    TextEntry::make('status')
                                        ->label('Status')
                                        ->badge()
                                        ->color(function ($record) {
                                            switch ($record->status) {
                                                case 'tidak berkualitas':
                                                    return 'danger';
                                                case 'berkualitas':
                                                    return 'success';
                                                default:
                                                    return 'warning';
                                            }
                                        })
                                        ->icon(fn($record) => match ($record->status) {
                                            'tidak berkualitas' => 'iconpark-badtwo-o',
                                            'berkualitas' => 'iconpark-goodtwo-o',
                                            default => 'heroicon-o-clock',
                                        }),
                                ]),
                                Group::make([
                                    TextEntry::make('laporanKondisiLapanganDetail.jenis_bibit')
                                        ->label('Bibit'),
                                    TextEntry::make('laporanKondisiLapanganDetail.estimasi_panen')
                                        ->label('Estimasi Panen'),
                                    ImageEntry::make('laporanKondisiLapanganDetail.foto_bibit')
                                        ->label('Foto Bibit'),
                                ]),
                            ])
                            ->columns(2)
                            ->icon('css-details-more'),
                        Tab::make('Detail Pelapor')
                            ->schema([
                                Group::make([
                                    TextEntry::make('penyuluh.penyuluhTerdaftar.nama')
                                        ->label('Nama'),
                                    TextEntry::make('penyuluh.penyuluhTerdaftar.no_hp')
                                        ->label('Telepon')
                                        ->copyable(),
                                    TextEntry::make('penyuluh.penyuluhTerdaftar.alamat')
                                        ->label('Alamat'),
                                    TextEntry::make('penyuluh.user.email')
                                        ->label('Email')
                                        ->copyable(),
                                ]),
                                Group::make([
                                    TextEntry::make('penyuluh.user.role')
                                        ->label('Role'),
                                    TextEntry::make('kelompokTani.desa.nama')
                                        ->label('Desa'),
                                    TextEntry::make('kelompokTani.kecamatan.nama')
                                        ->label('Kecamatan'),
                                ]),
                            ])
                            ->columns(2)
                            ->icon('phosphor-user-list'),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
