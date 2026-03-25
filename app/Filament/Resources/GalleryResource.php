<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    // ✅ FORM (CREATE + EDIT)
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('gallery')
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->rows(3),

                    Forms\Components\Select::make('category')
                  ->label('Category')
                  ->options([
                    'Truck' => 'Truck',
                     'Warehouse' => 'Warehouse',
                      'Shipping' => 'Shipping',
                      'Delivery' => 'Delivery'
                  ])
            ]);
    }

    // ✅ TABLE (LIST VIEW)
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image'),

                Tables\Columns\TextColumn::make('category')
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->limit(30),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // ✅ added delete
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

    // ✅ PAGES (IMPORTANT)
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}