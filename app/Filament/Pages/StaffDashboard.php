<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class StaffDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.staff-dashboard';

    public static function canAccess(): bool
    {
        return auth()->user()?->hasRole('staff');
    }
}
