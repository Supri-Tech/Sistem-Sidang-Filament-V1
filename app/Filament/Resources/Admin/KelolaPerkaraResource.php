<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelolaPerkaraResource\Pages;
use App\Filament\Resources\KelolaPerkaraResource\RelationManagers;
use App\Models\Perkara;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelolaPerkaraResource extends Resource
{
    protected static ?string $model = Perkara::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    public static function getPluralLabel(): string
    {
        return 'Perkara';
    }

    public static function getNavigationLabel(): string
    {
        return 'Kelola Perkara';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('no_perkara')->label('No Perkara')->required(),
                TextInput::make('jenis_perkara')->label('Jenis Perkara')->required(),
                TextInput::make('terdakwa')->required(),
                TextInput::make('korban')->required(),
                Select::make('status_perkara')->options([
                    'aktif' => 'Aktif',
                    'ditutup' => 'Ditutup',
                    'banding' => 'Banding',
                    'kasasi' => 'Kasasi',
                ])
                    ->searchable()
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_perkara'),
                TextColumn::make('jenis_perkara'),
                TextColumn::make('terdakwa'),
                TextColumn::make('korban'),
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
            'index' => Pages\ListKelolaPerkaras::route('/'),
            'create' => Pages\CreateKelolaPerkara::route('/create'),
            'edit' => Pages\EditKelolaPerkara::route('/{record}/edit'),
        ];
    }
}
