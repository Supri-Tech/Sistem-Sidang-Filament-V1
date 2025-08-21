<?php

namespace App\Filament\Resources\KelolaSidangResource\Pages;

use App\Filament\Resources\KelolaSidangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelolaSidangs extends ListRecords
{
    protected static string $resource = KelolaSidangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
