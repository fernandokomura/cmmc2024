<?php

namespace App\Filament\Resources\PartidoPoliticoResource\Pages;

use App\Filament\Resources\PartidoPoliticoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPartidoPolitico extends ViewRecord
{
    protected static string $resource = PartidoPoliticoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
