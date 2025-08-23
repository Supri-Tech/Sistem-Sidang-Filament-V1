<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin\PutusanResource\Pages;
use App\Filament\Resources\Admin\PutusanResource\RelationManagers;
use App\Models\PutusanSidang;
use App\Models\Sidang;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class PutusanResource extends Resource
{
    protected static ?string $model = PutusanSidang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getPluralLabel(): string
    {
        return 'Putusan';
    }

    public static function getNavigationLabel(): string
    {
        return 'Kelola Putusan';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_sidang')
                    ->label('Sidang')
                    ->options(Sidang::where('status', '!=', 'batal')->orWhere('status', '!=', 'selesai')->pluck('nama', 'id'))
                    ->searchable()
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('isi_putusan')
                    ->label('Isi Putusan')
                    ->columnSpanFull()
                    ->required(),
                DatePicker::make('tanggal_putusan')
                    ->label('Tanggal Putusan')
                    ->required(),
                Select::make('status')
                    ->label('Status Putusan')
                    ->options([
                        'draft' => 'Draft',
                        'final' => 'Final'
                    ])
                    ->required(),
                FileUpload::make('file_putusan')
                    ->label('File Putusan')
                    ->directory('putusan')
                    ->visibility('public')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(1024)
                    ->helperText('Maximum file: 1MB. Tipe file: PDF')
                    ->downloadable()
                    ->openable()
                    ->columnSpanFull()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sidang.nama')
                    ->label('Nama Sidang'),
                TextColumn::make('tanggal_putusan')->date(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'final' => 'success',
                        'draft' => 'warning'
                    }),
                TextColumn::make('file_putusan')
                ->label('File Putusan')
                ->formatStateUsing(fn ($state) => 'Download')
                ->url(fn ($record) => Storage::url($record->file_putusan))
                ->openUrlInNewTab()
                ->icon('heroicon-o-arrow-down-tray')
                ->iconPosition('after')
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
            'index' => Pages\ListPutusans::route('/'),
            'create' => Pages\CreatePutusan::route('/create'),
            'edit' => Pages\EditPutusan::route('/{record}/edit'),
        ];
    }
}
