<?php

namespace App\Filament\Pages\Staff;

use App\Models\Sidang as AppSidang;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class Sidang extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static string $view = 'filament.pages.staff.sidang';
    protected static ?string $navigationGroup = 'Data Sidang';
    protected static ?string $title = 'Jadwal Sidang';

    public function table(Table $table): Table
    {
        return $table
            ->query(AppSidang::query())
            ->columns([
                TextColumn::make('perkara.no_perkara')->label('Nomor Perkara'),
                TextColumn::make('waktu_sidang')->label('Waktu Sidang')->date(),
            ])
            ->filters([])
            ->actions([])
            ->bulkActions([]);
    }
}
