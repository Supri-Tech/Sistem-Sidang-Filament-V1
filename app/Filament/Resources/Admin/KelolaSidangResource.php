<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin\KelolaSidangResource\Pages;
use App\Filament\Resources\KelolaSidangResource\RelationManagers;
use App\Models\Hakim;
use App\Models\Perkara;
use App\Models\Sidang;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelolaSidangResource extends Resource
{
    protected static ?string $model = Sidang::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    public static function getPluralLabel(): string
    {
        return 'Sidang';
    }

    public static function getNavigationLabel(): string
    {
        return 'Kelola Sidang';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Nama Persidangan')
                    ->columnSpanFull()
                    ->required(),
                Select::make('id_hakim_ketua')
                    ->label('Hakim Ketua')
                    ->options(Hakim::where('jabatan', 'hakim ketua')->pluck('nama', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('id_hakim_anggota_1')
                    ->label('Hakim Anggota 1')
                    ->options(Hakim::where('jabatan', 'hakim anggota')->pluck('nama', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('id_hakim_anggota_2')
                    ->label('Hakim Anggota 2')
                    ->options(Hakim::where('jabatan', 'hakim anggota')->pluck('nama', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('id_panitera')
                    ->label('Panitera Pengganti')
                    ->options(Hakim::where('jabatan', 'panitera pengganti')->pluck('nama', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('id_perkara')
                    ->label('Perkara')
                    ->options(Perkara::all()->pluck('no_perkara', 'id'))
                    ->searchable()
                    ->required(),
                TextInput::make('ruang_sidang')
                    ->label('Ruang Sidang')
                    ->required(),
                DateTimePicker::make('waktu_sidang')
                    ->label('Waktu Sidang')
                    ->seconds(false)
                    ->required(),
                Select::make('status')
                    ->label('Status Sidang')
                    ->options([
                        'terjadwal' => 'Terjadwal',
                        'ditunda' => 'Ditunda',
                        'selesai' => 'Selesai',
                        'batal' => 'Batal'
                    ])
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('perkara.no_perkara')->label('No Perkara'),
                TextColumn::make('ruang_sidang'),
                TextColumn::make('waktu_sidang'),
                TextColumn::make('status')->badge(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListKelolaSidangs::route('/'),
            'create' => Pages\CreateKelolaSidang::route('/create'),
            'edit' => Pages\EditKelolaSidang::route('/{record}/edit'),
        ];
    }
}
