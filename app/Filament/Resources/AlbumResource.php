<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlbumResource\Pages;
use App\Filament\Resources\AlbumResource\RelationManagers\PhotographRelationManager;
use Illuminate\Support\Str;
use App\Models\Album;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;

use Illuminate\Support\Facades\Auth;

use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlbumResource extends Resource
{
    protected static ?string $model = Album::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_name')
                    ->label('Autor')
                    ->default(fn() => Auth::user()->name)
                    ->hidden(fn(string $operation): bool => $operation === 'edit') // ← Oculta en edición
                    ->disabled()
                    ->dehydrated(false),
                Forms\Components\TextInput::make('title')
                    ->label('Titulo')
                    ->required()
                    ->columnSpanFull()
                    ->live(onBlur: true) // Actualiza el slug al salir del campo
                    ->afterStateUpdated(function ($state, Forms\Set $set, $operation) {
                        $set('slug', Str::slug($state)); // Genera el slug automáticamente
                        if ($operation === 'edit') {
                            $set('slug', Str::slug($state)); // Fuerza actualización en edición
                        }
                    })
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->label('Descripción')
                    ->columnSpanFull()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->disabled()
                    ->dehydrated()
                    ->unique(ignoreRecord: true) // Evita duplicados
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('main_photo')
                    ->label('Foto de portada')
                    ->image()
                    ->directory('album')
                    ->maxSize(2048) // en KB
                    ->imageResizeTargetWidth('800')
                    ->imageResizeTargetHeight('600')
                    ->imageResizeMode('cover')
                    ->imagePreviewHeight('250')
                    ->required(),
                Forms\Components\Hidden::make('user_id')
                    ->default(fn() => Auth::id()) // Asigna el ID automáticamente
                    ->dehydrated(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Titulo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Descripción')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('main_photo')
                    ->label('Foto de portada')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Autor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de creación')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha de actualización')
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
            PhotographRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlbums::route('/'),
            'create' => Pages\CreateAlbum::route('/create'),
            'edit' => Pages\EditAlbum::route('/{record}/edit'),
        ];
    }
}
