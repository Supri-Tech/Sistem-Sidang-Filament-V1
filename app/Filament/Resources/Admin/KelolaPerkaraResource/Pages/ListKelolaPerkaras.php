<?php

namespace App\Filament\Resources\Admin\KelolaPerkaraResource\Pages;

use App\Filament\Resources\Admin\KelolaPerkaraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelolaPerkaras extends ListRecords
{
    protected static string $resource = KelolaPerkaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
