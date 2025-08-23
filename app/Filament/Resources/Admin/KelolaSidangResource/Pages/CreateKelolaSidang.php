<?php

namespace App\Filament\Resources\Admin\KelolaSidangResource\Pages;

use App\Filament\Resources\Admin\KelolaSidangResource;
use App\Mail\SidangCreatedMail;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Mail;

class CreateKelolaSidang extends CreateRecord
{
    protected static string $resource = KelolaSidangResource::class;

    protected function afterCreate(): void
    {
        $sidang = $this->record;
        $perkara = $sidang->perkara;

        if($perkara){
            if($perkara->email_terdakwa){
                Mail::to($perkara->email_terdakwa)->send(new SidangCreatedMail($sidang));
            }

            if($perkara->email_korban){
                Mail::to($perkara->email_korban)->send(new SidangCreatedMail($sidang));
            }
        }
    }
}
