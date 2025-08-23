<?php

namespace App\Filament\Resources\Admin\KelolaPerkaraResource\Pages;

use App\Filament\Resources\Admin\KelolaPerkaraResource;
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
