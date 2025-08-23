<?php

namespace App\Filament\Resources\Admin\PutusanResource\Pages;

use App\Filament\Resources\Admin\PutusanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPutusan extends EditRecord
{
    protected static string $resource = PutusanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
