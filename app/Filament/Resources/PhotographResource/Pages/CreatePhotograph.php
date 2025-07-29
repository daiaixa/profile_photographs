<?php

namespace App\Filament\Resources\PhotographResource\Pages;

use App\Filament\Resources\PhotographResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreatePhotograph extends CreateRecord
{
    protected static string $resource = PhotographResource::class;

    protected function getRedirectUrl(): string
    {
        Notification::make()
            ->title($this->getCreatedNotificationTitle() ?? $this->getEditedNotificationTitle());
        return $this->getResource()::getUrl('index');
    }
}
