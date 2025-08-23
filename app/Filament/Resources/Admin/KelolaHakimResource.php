<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin\KelolaHakimResource\Pages;
use App\Filament\Resources\KelolaHakimResource\RelationManagers;
use App\Models\Hakim;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelolaHakimResource extends Resource
{
    protected static ?string $model = Hakim::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function getPluralLabel(): string
    {
        return 'Hakim';
    }

    public static function getNavigationLabel(): string
    {
        return 'Kelola Hakim';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required(),
                TextInput::make('jabatan')->required(),
                TextInput::make('NIP')->label('NIP')->columnSpanFull()->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable(),
                TextColumn::make('jabatan')->searchable(),
                TextColumn::make('NIP')->label('NIP')
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
            'index' => Pages\ListKelolaHakims::route('/'),
            'create' => Pages\CreateKelolaHakim::route('/create'),
            'edit' => Pages\EditKelolaHakim::route('/{record}/edit'),
        ];
    }
}
