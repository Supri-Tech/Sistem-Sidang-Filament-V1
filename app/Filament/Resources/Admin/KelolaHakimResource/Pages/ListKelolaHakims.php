<?php

namespace App\Filament\Resources\Admin\KelolaHakimResource\Pages;

use App\Filament\Resources\Admin\KelolaHakimResource;
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
