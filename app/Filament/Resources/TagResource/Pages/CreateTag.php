<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTag extends CreateRecord
{
    protected static string $resource = TagResource::class;

    protected function getRedirectUrl(): string
    {
        Notification::make()
            ->title($this->getCreatedNotificationTitle() ?? $this->getEditedNotificationTitle());
        return $this->getResource()::getUrl('index');
    }
}
