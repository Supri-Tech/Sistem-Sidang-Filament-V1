<?php

namespace App\Filament\Pages\Admin;

use Filament\Infolists\Infolist;
use Filament\Infolists\Components as Info;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Profile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.admin.profile';
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record(Auth::user())
            ->schema([
                Info\Grid::make(2)->schema([
                    Info\TextEntry::make('name')
                        ->label('Name')
                        ->icon('heroicon-o-user'),
                    Info\TextEntry::make('email')
                        ->label('Email')
                        ->icon('heroicon-o-envelope'),
                    Info\TextEntry::make('created_at')
                        ->label('Joined')
                        ->dateTime(),
                    Info\TextEntry::make('email_verified_at')
                        ->label('Email Verified')
                        ->dateTime()
                        ->badge()
                        ->color(fn (?string $state): string => $state ? 'success' : 'danger')
                ])
            ]);
    }
}
