<?php

namespace App\Filament\Resources\ParlamentarResource\Pages;

use App\Filament\Resources\ParlamentarResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewParlamentar extends ViewRecord
{
    protected static string $resource = ParlamentarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
