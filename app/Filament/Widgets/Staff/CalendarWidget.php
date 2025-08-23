<?php

namespace App\Filament\Widgets\Staff;

use App\Models\Sidang;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    // protected static string $view = 'filament.widgets.calendar-widget';

    public function fetchEvents(array $fetchInfo): array
    {
        return Sidang::query()
            ->whereBetween('waktu_sidang', [$fetchInfo['start'], $fetchInfo['end']])
            ->get()
            ->map(function (Sidang $sidang) {
                return [
                    'id'    => $sidang->id,
                    'title' => 'Sidang ' . $sidang->perkara->jenis_perkara,
                    'start' => $sidang->waktu_sidang
                ];
            })
            ->toArray();
    }
}
