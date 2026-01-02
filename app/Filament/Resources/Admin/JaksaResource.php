<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin\JaksaResource\Pages;
use App\Filament\Resources\Admin\JaksaResource\RelationManagers;
use App\Models\Jaksa;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JaksaResource extends Resource
{
    protected static ?string $model = Jaksa::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function getPluralLabel(): string
    {
        return 'Jaksa';
    }

    public static function getNavigationLabel(): string
    {
        return 'Kelola Jaksa';
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
            'index' => Pages\ListJaksas::route('/'),
            'create' => Pages\CreateJaksa::route('/create'),
            'edit' => Pages\EditJaksa::route('/{record}/edit'),
        ];
    }
}
