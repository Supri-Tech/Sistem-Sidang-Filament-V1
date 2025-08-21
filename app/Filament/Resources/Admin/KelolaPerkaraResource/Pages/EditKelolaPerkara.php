<?php

namespace App\Filament\Resources\KelolaPerkaraResource\Pages;

use App\Filament\Resources\KelolaPerkaraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelolaPerkara extends EditRecord
{
    protected static string $resource = KelolaPerkaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
