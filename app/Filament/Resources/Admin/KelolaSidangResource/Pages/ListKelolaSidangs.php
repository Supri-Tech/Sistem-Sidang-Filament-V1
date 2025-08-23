<?php

namespace App\Filament\Resources\Admin\KelolaSidangResource\Pages;

use App\Filament\Resources\Admin\KelolaSidangResource;
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
