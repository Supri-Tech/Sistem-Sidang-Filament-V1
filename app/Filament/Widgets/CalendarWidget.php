<?php

namespace App\Filament\Widgets;

use App\Models\Sidang;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Filament\Widgets\Widget;

class CalendarWidget extends FullCalendarWidget
{
    protected static string $view = 'filament.widgets.calendar-widget';

    public function fetchEvents(array $fetchInfo): array
    {
        return Sidang::query()
            ->whereBetween('waktu_sidang', [$fetchInfo['waktu_sidang'], $fetchInfo['waktu_sidang']])
            ->get()
            ->map(function (Sidang $sidang) {
                return [
                    'id'    => $sidang->id,
                ];
            })
            ->toArray();
    }
}
