<?php

namespace App\Filament\Resources\Admin\KelolaBeritaResource\Pages;

use App\Filament\Resources\Admin\KelolaBeritaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelolaBeritas extends ListRecords
{
    protected static string $resource = KelolaBeritaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
