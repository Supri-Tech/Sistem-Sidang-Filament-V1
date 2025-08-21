<?php

namespace App\Filament\Resources\KelolaHakimResource\Pages;

use App\Filament\Resources\KelolaHakimResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelolaHakim extends EditRecord
{
    protected static string $resource = KelolaHakimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
