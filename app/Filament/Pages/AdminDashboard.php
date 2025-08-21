<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\CalendarWidget;
use App\Filament\Widgets\UpperStatAdmin;
use Filament\Pages\Dashboard;

class AdminDashboard extends Dashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.admin-dashboard';

    public static function canAccess(): bool
    {
        return auth()->user()?->hasRole('admin');
    }

    public function getFooterWidgets(): array
    {
        return [
            UpperStatAdmin::class,
            CalendarWidget::class
        ];
    }
}
