<?php

namespace App\Filament\Resources\AlbumResource\Pages;

use App\Filament\Resources\AlbumResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateAlbum extends CreateRecord
{
    protected static string $resource = AlbumResource::class;

    protected function getRedirectUrl(): string
    {
        Notification::make()
            ->title($this->getCreatedNotificationTitle() ?? $this->getEditedNotificationTitle());
        return $this->getResource()::getUrl('index');
    }
}
