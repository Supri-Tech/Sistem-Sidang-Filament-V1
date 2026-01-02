<?php

namespace App\Filament\Resources\Admin\JaksaResource\Pages;

use App\Filament\Resources\Admin\JaksaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJaksa extends EditRecord
{
    protected static string $resource = JaksaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
