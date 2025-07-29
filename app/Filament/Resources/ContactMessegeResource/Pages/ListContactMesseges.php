<?php

namespace App\Filament\Resources\ContactMessegeResource\Pages;

use App\Filament\Resources\ContactMessegeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactMesseges extends ListRecords
{
    protected static string $resource = ContactMessegeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
