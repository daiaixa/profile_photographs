<?php

namespace App\Filament\Resources\AlbumResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PhotographRelationManager extends RelationManager
{
    protected static string $relationship = 'photographs';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title') // si querés mostrar otro campo
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Foto'),
                Tables\Columns\TextColumn::make('description')
                    ->label('Descripción')
                    ->default('No hay descripción'),
            ])
            ->headerActions([]) // 🔒 No permitir agregar
            ->actions([
                Tables\Actions\Action::make('Quitar del album')
                    ->icon('heroicon-o-link-slash')
                    ->action(fn($record) => $record->update(['album_id' => null]))
                    ->requiresConfirmation()
                    ->color('warning'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                
            ])       // 🔒 No permitir editar ni borrar
            ->bulkActions([]);  // 🔒 No permitir acciones masivas
    }
}
