<?php

namespace App\Filament\Pages\Staff;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components as Info;
use Illuminate\Support\Facades\Auth;

class Profile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.staff.profile';
    protected static ?string $title = 'Profil';
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record(Auth::user())
            ->schema([
                Info\Section::make('User Information')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Info\Grid::make(2)->schema([
                            Info\TextEntry::make('name')
                                ->label('Nama')
                                ->icon('heroicon-o-user'),
                            Info\TextEntry::make('email')
                                ->label('Email')
                                ->icon('heroicon-o-envelope'),
                            // Info\TextEntry::make('id_jaksa')
                            //     ->label('ID Jaksa')
                            //     ->badge()
                            //     ->color(fn ($state) => $state ? 'success' : 'gray'),
                            Info\TextEntry::make('created_at')
                                ->label('Bergabung pada')
                                ->dateTime(),
                            // Info\TextEntry::make('email_verified_at')
                            //     ->label('Email Verified')
                            //     ->dateTime()
                            //     ->badge()
                            //     ->color(fn (?string $state): string => $state ? 'success' : 'danger'),
                        ]),
                    ]),

                Info\Section::make('Informasi Jaksa')
                    ->icon('heroicon-o-briefcase')
                    ->visible(fn (User $record) => $record->jaksa !== null)
                    ->schema([
                        Info\Grid::make(2)->schema([
                            Info\TextEntry::make('jaksa.nama')
                                ->label('Nama Jaksa'),

                            Info\TextEntry::make('jaksa.NIP')
                                ->label('NIP')
                                ->badge()
                                ->color('primary'),

                            Info\TextEntry::make('jaksa.jabatan')
                                ->label('Jabatan')
                                ->badge()
                                ->color('info'),
                        ]),
                    ]),
            ]);
    }
}
