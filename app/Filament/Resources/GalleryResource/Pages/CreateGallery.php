<?php

namespace App\Filament\Resources;

use App\Models\Gallery;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Gallery';

    // ✅ FORM
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('images')
                    ->label('Gallery Images')
                    ->multiple()
                    ->image()
                    ->directory('galleries')
                    ->required(),

                Forms\Components\TextInput::make('category')
                    ->label('Category'),
            ]);
    }

    // ✅ TABLE
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Main Image'),

                Tables\Columns\TextColumn::make('category')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}