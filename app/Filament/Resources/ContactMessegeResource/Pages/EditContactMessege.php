<?php

namespace App\Filament\Resources\ContactMessegeResource\Pages;

use App\Filament\Resources\ContactMessegeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactMessege extends EditRecord
{
    protected static string $resource = ContactMessegeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
