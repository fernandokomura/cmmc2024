<?php

namespace App\Filament\Resources\ParlamentarResource\Pages;

use App\Filament\Resources\ParlamentarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListParlamentars extends ListRecords
{
    protected static string $resource = ParlamentarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
