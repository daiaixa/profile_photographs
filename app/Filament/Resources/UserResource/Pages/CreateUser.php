<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        Notification::make()
            ->title($this->getCreatedNotificationTitle() ?? $this->getEditedNotificationTitle());
        return $this->getResource()::getUrl('index');
    }
}
