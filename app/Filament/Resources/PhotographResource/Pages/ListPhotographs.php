<?php

namespace App\Filament\Resources\PhotographResource\Pages;

use App\Filament\Resources\PhotographResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPhotographs extends ListRecords
{
    protected static string $resource = PhotographResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
