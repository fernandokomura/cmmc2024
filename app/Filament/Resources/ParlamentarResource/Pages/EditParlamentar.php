<?php

namespace App\Filament\Resources\ParlamentarResource\Pages;

use App\Filament\Resources\ParlamentarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditParlamentar extends EditRecord
{
    protected static string $resource = ParlamentarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
