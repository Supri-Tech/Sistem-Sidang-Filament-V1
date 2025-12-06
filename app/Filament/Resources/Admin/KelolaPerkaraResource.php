<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin\KelolaPerkaraResource\Pages;
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

    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->hasRole('admin');
    }

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
                TextInput::make('email_terdakwa')->label('Email Terdakwa')->email()->required(),
                TextInput::make('email_korban')->label('Email Korban')->email()->required(),
                TextInput::make('wa_terdakwa')->label('No WA Terdakwa')->required(),
                TextInput::make('wa_korban')->label('No WA Korban')->required(),
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
                TextColumn::make('no_perkara')->searchable(),
                TextColumn::make('jenis_perkara')->searchable(),
                TextColumn::make('terdakwa')->searchable(),
                TextColumn::make('korban')->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'aktif' => 'success',
                        'kasasi' => 'secondary',
                        'banding' => 'warning',
                        'ditutup' => 'danger'
                    }),
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
