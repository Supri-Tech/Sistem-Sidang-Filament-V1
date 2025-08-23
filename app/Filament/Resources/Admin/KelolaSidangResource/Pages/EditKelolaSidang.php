<?php

namespace App\Filament\Resources\Admin\KelolaSidangResource\Pages;

use App\Filament\Resources\Admin\KelolaSidangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelolaSidang extends EditRecord
{
    protected static string $resource = KelolaSidangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
