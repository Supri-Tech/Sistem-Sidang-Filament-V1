<?php

namespace App\Filament\Resources\Admin\JaksaResource\Pages;

use App\Filament\Resources\Admin\JaksaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJaksas extends ListRecords
{
    protected static string $resource = JaksaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
