<?php

namespace App\Filament\Pages\Admin;

use App\Filament\Widgets\Admin\CalendarWidget;
use App\Filament\Widgets\Admin\UpperStatAdmin;
use Filament\Pages\Dashboard;

class AdminDashboard extends Dashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.admin-dashboard';

    public static function canView(): bool
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
