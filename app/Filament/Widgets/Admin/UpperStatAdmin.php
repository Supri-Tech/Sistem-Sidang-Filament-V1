<?php

namespace App\Filament\Widgets\Admin;

use App\Models\Hakim;
use App\Models\Perkara;
use App\Models\Sidang;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UpperStatAdmin extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Hakim', Hakim::count()),
            Stat::make('Total Perkara', Perkara::count()),
            Stat::make('Total Sidang', Sidang::count()),
            Stat::make('Total Users', User::count()),
        ];
    }
}
