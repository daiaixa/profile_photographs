<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhotographResource\Pages;
use App\Filament\Resources\PhotographResource\RelationManagers;
use App\Models\Photograph;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PhotographResource extends Resource
{
    protected static ?string $model = Photograph::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->default(fn() => Photograph::generateDefaultTitle())
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->label('Descripción')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image_path')
                    ->label('Foto')
                    ->image()
                    ->directory('photographs')
                    ->maxSize(2048) // en KB
                    ->imageResizeTargetWidth('800')
                    ->imageResizeTargetHeight('600')
                    ->imageResizeMode('cover')
                    ->imagePreviewHeight('250')
                    ->required(),
                Forms\Components\Hidden::make('user_id')
                    ->default(fn() => Auth::id()) // Asigna el ID automáticamente
                    ->dehydrated(),
                Forms\Components\Select::make('album_id')
                    ->label('Álbum')
                    ->relationship('album', 'title')  // Muestra el título del álbum
                    ->searchable()  // Permite búsqueda
                    ->preload(),  // Carga opciones anticipadamente
                Forms\Components\Select::make('tags') // ¡Usa el nombre de la RELACIÓN, no de la tabla!
                    ->label('Etiquetas')
                    ->relationship('tags', 'name') // 'name' es el campo a mostrar de Tag
                    ->multiple() // Permite selección múltiple
                    ->preload() // Carga opciones iniciales
                    ->searchable() // Búsqueda tipo autocomplete
                    ->required(),
                Forms\Components\TextInput::make('user_name')
                    ->label('Autor')
                    ->columnSpanFull()
                    ->default(fn() => Auth::user()->name)
                    ->hidden(fn(string $operation): bool => $operation === 'edit') // ← Oculta en edición
                    ->disabled()
                    ->dehydrated(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Descripción')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Fotografia'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Autor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('album.title')
                    ->label('Titulo del album')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tags.name')
                    ->label('Etiquetas')
                    ->badge() // Opcional: muestra como badges
                    ->separator(', '), // Separa múltiples etiquetas
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPhotographs::route('/'),
            'create' => Pages\CreatePhotograph::route('/create'),
            'edit' => Pages\EditPhotograph::route('/{record}/edit'),
        ];
    }
}
