<?php

namespace App\Filament\Resources\PostCategories\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class PostCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Category Name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                    
                TextColumn::make('slug')
                    ->label('URL Slug')
                    ->searchable()
                    ->color('gray')
                    ->copyable()
                    ->copyMessage('Slug copied to clipboard'),
                    
                ToggleColumn::make('is_active')
                    ->label('Active Status'),
                    
                TextColumn::make('created_at')
                    ->label('Created On')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            // Note: Changed from recordActions to standard actions() for correct Filament syntax
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            // Note: Changed from toolbarActions to bulkActions()
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}