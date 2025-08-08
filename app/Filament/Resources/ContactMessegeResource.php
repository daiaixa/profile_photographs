<?php

namespace App\Filament\Resources;


use App\Filament\Resources\ContactMessegeResource\Pages;
use App\Models\ContactMessege;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\Grid;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
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
                        Grid::make(2)
                            ->schema([
                                Placeholder::make('Nombre completo')
                                    ->content((fn($record) => $record->fullname)),
                                Placeholder::make('Telefono - Email')
                                    ->content((fn($record) => $record->phone . ' - ' . $record->email)),
                            ]),
                        Placeholder::make('Asunto')
                            ->content(fn(ContactMessege $record) => $record->subject),
                        Textarea::make('message')
                            ->label('Mensaje')
                            ->disabled()
                            ->rows(5)
                            ->columnSpanFull(),
                    ])
                    ->modalSubmitAction(false) //desactiva el botón de enviar
                    ->closeModalByClickingAway(true) // Permite cerrar el modal al hacer clic fuera de él
                    ->extraModalFooterActions([
                        Action::make('markAsRead')
                            ->label('')
                            ->tooltip('Marcar como leído')
                            ->icon('heroicon-o-check')
                            ->color('success')
                            ->action(function (ContactMessege $record) {
                                $record->update(['is_read' => true]);
                            }),
                        Action::make('respond')
                            ->label('Responder')
                            ->color('primary')
                            ->form([
                                RichEditor::make('respuesta')
                                    ->label('Escribe tu respuesta aquí')
                                    ->required()
                                    ->toolbarButtons(['bold', 'italic', 'link', 'bulletList', 'orderedList']),
                            ])
                            ->modalHeading('Responder al mensaje')
                            ->modalSubmitActionLabel('Enviar respuesta')
                            ->action(function (ContactMessege $record, array $data) {
                                // Enviar la respuesta por email
                                

                                $record->update(['is_read' => true]);

                                Notification::make()
                                    ->title('Respuesta enviada con éxito')
                                    ->success()
                                    ->send();
                            }),
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
