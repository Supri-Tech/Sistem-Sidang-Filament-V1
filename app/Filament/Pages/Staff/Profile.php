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
                                ->label('Name')
                                ->icon('heroicon-o-user'),
                            Info\TextEntry::make('email')
                                ->label('Email')
                                ->icon('heroicon-o-envelope'),
                            Info\TextEntry::make('id_hakim')
                                ->label('Hakim ID')
                                ->badge()
                                ->color(fn ($state) => $state ? 'success' : 'gray'),
                            Info\TextEntry::make('created_at')
                                ->label('Joined')
                                ->dateTime(),
                            Info\TextEntry::make('email_verified_at')
                                ->label('Email Verified')
                                ->dateTime()
                                ->badge()
                                ->color(fn (?string $state): string => $state ? 'success' : 'danger'),
                        ]),
                    ]),

                Info\Section::make('Hakim Details')
                    ->icon('heroicon-o-briefcase')
                    ->visible(fn (User $record) => $record->hakim !== null)
                    ->schema([
                        Info\Grid::make(2)->schema([
                            Info\TextEntry::make('hakim.nama')
                                ->label('Full Name'),
                            Info\TextEntry::make('hakim.nip')
                                ->label('NIP'),
                            Info\TextEntry::make('hakim.pangkat_golongan')
                                ->label('Rank / Grade'),
                            Info\TextEntry::make('hakim.jabatan')
                                ->label('Position'),
                            Info\TextEntry::make('hakim.tempat_lahir')
                                ->label('Place of Birth'),
                            Info\TextEntry::make('hakim.tanggal_lahir')
                                ->label('Date of Birth')
                                ->date('d F Y'),
                            Info\TextEntry::make('hakim.alamat')
                                ->label('Address')
                                ->columnSpanFull(),
                        ]),
                    ]),
            ]);
    }
}
