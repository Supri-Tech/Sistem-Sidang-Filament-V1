<?php

namespace App\Filament\Resources\Admin\PutusanResource\Pages;

use App\Filament\Resources\Admin\PutusanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPutusans extends ListRecords
{
    protected static string $resource = PutusanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
