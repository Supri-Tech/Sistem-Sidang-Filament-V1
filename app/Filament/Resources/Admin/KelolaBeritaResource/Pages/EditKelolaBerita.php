<?php

namespace App\Filament\Resources\KelolaBeritaResource\Pages;

use App\Filament\Resources\KelolaBeritaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelolaBerita extends EditRecord
{
    protected static string $resource = KelolaBeritaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
