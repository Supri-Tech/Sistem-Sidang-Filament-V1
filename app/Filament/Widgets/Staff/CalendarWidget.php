<?php

namespace App\Filament\Widgets\Staff;

use App\Models\Sidang;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Saade\FilamentFullCalendar\Actions\ViewAction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    // protected static string $view = 'filament.widgets.calendar-widget';

    public Model | string | null $model = Sidang::class;

    public function fetchEvents(array $fetchInfo): array
    {
        $query = Sidang::query()
            ->with(['perkara', 'hakim', 'hakimAnggota1', 'hakimAnggota2', 'hakimPanitera', 'jaksa'])
            ->whereBetween('waktu_sidang', [$fetchInfo['start'], $fetchInfo['end']]);

        $user = Auth::user();
        // if($user && $user->id_hakim){
        //     $query->where(function ($q) use ($user){
        //         $q->where('id_hakim_ketua', $user->id_hakim)
        //           ->orWhere('id_hakim_anggota_1', $user->id_hakim)
        //           ->orWhere('id_hakim_anggota_2', $user->id_hakim)
        //           ->orWhere('id_panitera', $user->id_hakim);
        //     });
        // }

        if ($user && $user->id_jaksa) {
            $query->where('id_jaksa', $user->id_jaksa);
        }

        return $query
            ->get()
            ->map(fn (Sidang $sidang) => [
                'id' => $sidang->id,
                'title' => 'Sidang ' . $sidang->perkara->jenis_perkara,
                'start' => $sidang->waktu_sidang,
            ])
            ->toArray();
    }

    protected function viewAction(): ViewAction
    {
        return ViewAction::make()
            ->infolist(fn (Sidang $record): Infolist => $this->getRecordInfolist($record))
            ->modalHeading(fn (Sidang $record) => 'Detail Sidang: ' . $record->perkara->jenis_perkara);
    }

    protected function resolveRecord(string|int $id): Model
    {
        return Sidang::with(['perkara', 'hakim', 'hakimAnggota1', 'hakimAnggota2', 'hakimPanitera', 'jaksa'])
            ->findOrFail($id);
    }

    public function getRecordInfolist(Sidang $record): Infolist
    {
        return Infolist::make()
            ->record($record)
            ->schema([
                Section::make('Perkara')
                    ->schema([
                        TextEntry::make('perkara.no_perkara')->label('No. Perkara'),
                        TextEntry::make('perkara.jenis_perkara')->label('Jenis Perkara'),
                        TextEntry::make('perkara.terdakwa')->label('Terdakwa'),
                        TextEntry::make('perkara.korban')->label('Korban'),
                    ])->columns(2),

                Section::make('Sidang')
                    ->schema([
                        TextEntry::make('ruang_sidang')->label('Ruang Sidang'),
                        TextEntry::make('waktu_sidang')->label('Waktu Sidang')->dateTime(),
                        TextEntry::make('status')->label('Status'),
                    ])->columns(2),

                Section::make('Majelis Hakim')
                    ->schema([
                        TextEntry::make('jaksa.nama')
                            ->label('Jaksa Penuntut Umum')
                            ->placeholder('N/A'),
                        TextEntry::make('hakim.nama')->label('Ketua Hakim'),
                        TextEntry::make('hakimAnggota1.nama')->label('Hakim Anggota 1'),
                        TextEntry::make('hakimAnggota2.nama')->label('Hakim Anggota 2'),
                        TextEntry::make('hakimPanitera.nama')->label('Panitera'),
                    ])->columns(2),
            ]);
    }

    protected function headerActions(): array
    {
        return [];
    }

    protected function modalActions(): array
    {
        return [];
    }
}
