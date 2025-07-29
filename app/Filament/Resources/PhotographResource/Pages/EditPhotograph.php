<?php

namespace App\Filament\Resources\PhotographResource\Pages;

use App\Filament\Resources\PhotographResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPhotograph extends EditRecord
{
    protected static string $resource = PhotographResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
