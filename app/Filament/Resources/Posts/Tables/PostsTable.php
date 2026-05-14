<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Displays the uploaded featured image
                ImageColumn::make('featured_image')
                    ->label('Image')
                    ->circular(),
                    
                TextColumn::make('title')
                    ->label('Post Title')
                    ->searchable()
                    ->sortable()
                    ->limit(40) // Keeps the table clean if titles are long
                    ->weight('bold'),
                    
                // Displays the linked Category name as a neat badge
                TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->color('danger') // Gives it a nice red/pink color to match your brand
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('published_at')
                    ->label('Publish Date')
                    ->date()
                    ->sortable(),
                    
                // Quick toggle to publish/unpublish from the main list
                ToggleColumn::make('is_published')
                    ->label('Published'),
            ])
            ->filters([
                // Adds a dropdown filter at the top right to filter posts by category
                SelectFilter::make('post_category_id')
                    ->relationship('category', 'name')
                    ->label('Filter by Category'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}