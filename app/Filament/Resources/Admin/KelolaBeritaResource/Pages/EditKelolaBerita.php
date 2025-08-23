<?php

namespace App\Filament\Resources\Admin\KelolaBeritaResource\Pages;

use App\Filament\Resources\Admin\KelolaBeritaResource;
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
