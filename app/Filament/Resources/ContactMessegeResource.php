<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessegeResource\Pages;
use App\Filament\Resources\ContactMessegeResource\RelationManagers;
use App\Models\ContactMessege;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email del remitente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Teléfono del remitente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->label('Asunto del contacto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('message')
                    ->label('Mensaje')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_read')
                    ->label('Leído')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de creación')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
}
