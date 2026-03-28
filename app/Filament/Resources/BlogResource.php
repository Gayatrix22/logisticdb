<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // ✅ FORM
    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\TextInput::make('title')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($state, $set) =>
                    $set('slug', Str::slug($state))
                ),

            Forms\Components\TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true),

            Forms\Components\Textarea::make('short_description')
                ->rows(3),

            Forms\Components\Textarea::make('description')
                ->label('Description')
                ->rows(4),

            Forms\Components\RichEditor::make('content')
    ->required()
    ->columnSpanFull(),

            // ✅ MAIN IMAGE FIXED
            Forms\Components\FileUpload::make('main_image')
                ->image()
                ->disk('public') // 🔥 IMPORTANT
                ->directory('blogs/main'),

            // ✅ GALLERY IMAGES FIXED
            Forms\Components\FileUpload::make('gallery_images')
                ->image()
                ->multiple()
                ->disk('public') // 🔥 IMPORTANT
                ->directory('blogs/gallery'),

            Forms\Components\TagsInput::make('tags'),

        ]);
    }

    // ✅ TABLE
    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                // ✅ IMAGE SHOW FIXED
                Tables\Columns\ImageColumn::make('main_image')
                    ->disk('public') // 🔥 IMPORTANT
                    ->label('Image'),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tags')
                    ->limit(20),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}