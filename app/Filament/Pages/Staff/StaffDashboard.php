<?php

namespace App\Filament\Pages\Staff;

use App\Filament\Widgets\Staff\CalendarWidget;
use Filament\Pages\Dashboard;

class StaffDashboard extends Dashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.staff-dashboard';

    public static function canView(): bool
    {
        return auth()->user()?->hasRole('staff');
    }

    public function getFooterWidgets(): array
    {
        return [
            CalendarWidget::class
        ];
    }
}
