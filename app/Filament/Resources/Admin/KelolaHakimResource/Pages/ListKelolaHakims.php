<?php

namespace App\Filament\Resources\KelolaHakimResource\Pages;

use App\Filament\Resources\KelolaHakimResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelolaHakims extends ListRecords
{
    protected static string $resource = KelolaHakimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
