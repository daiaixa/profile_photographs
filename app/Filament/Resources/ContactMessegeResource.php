<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessegeResource\Pages;

use App\Models\ContactMessege;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;


class ContactMessegeResource extends Resource
{
    protected static ?string $model = ContactMessege::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('fullname')
                    ->label('Nombre completo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label('Teléfono')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subject')
                    ->label('Asunto')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('message')
                    ->label('Mensaje')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_read')
                    ->label('Leído')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fullname')
                    ->label('Nombre completo del remitente')
                    ->weight(fn(ContactMessege $record) => $record->is_read ? 'normal' : 'bold')
                    ->color(fn(ContactMessege $record) => $record->is_read ? 'gray' : 'primary'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de recepcion')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email del remitente')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Teléfono del remitente')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('subject')
                    ->label('Asunto del contacto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('message')
                    ->label('Mensaje')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('is_read')
                    ->label('Leído')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha de lectura')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make() // Solo permite ver, no editar
                    ->modalHeading('Mensaje de contacto')
                    ->form([
                        TextInput::make('fullname')->disabled(),
                        TextInput::make('email')->disabled(),
                        TextInput::make('phone')->disabled(),
                        TextInput::make('subject')->disabled(),
                        Textarea::make('message')
                            ->disabled()
                            ->rows(10)
                            ->columnSpanFull(),
                    ])
                    ->action(function (ContactMessege $record) {
                        if (!$record->is_read) {
                            $record->update(['is_read' => true]);
                            // Forzar refresco de la tabla
                            $this->refresh();
                        }
                    })
                    ->extraModalFooterActions([
                        Action::make('markAsRead')
                            ->label('Marcar como leído')
                            ->color('primary')
                            ->action(function (ContactMessege $record) {
                                $record->update(['is_read' => true]);
                            })
                    ])
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMesseges::route('/'),
            'create' => Pages\CreateContactMessege::route('/create'),
            'edit' => Pages\EditContactMessege::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(mixed $record): bool
    {
        return false;
    }
}
