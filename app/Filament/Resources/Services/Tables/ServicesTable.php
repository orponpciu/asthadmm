<?php

namespace App\Filament\Resources\Services\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Service Name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('slug')
                    ->label('URL Slug')
                    ->icon('heroicon-o-link')
                    ->color('gray')
                    ->copyable()
                    ->searchable(),

                // Shows how many sections (Hero, FAQ, etc.) are in the JSON content
                TextColumn::make('content')
                    ->label('Sections')
                    ->state(function ($record): int {
                        return is_array($record->content) ? count($record->content) : 0;
                    })
                    ->badge()
                    ->color('info')
                    ->suffix(' Blocks'),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d M, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Filter to quickly find pages with a lot of content
                Filter::make('extensive_pages')
                    ->query(fn (Builder $query): Builder => $query->whereJsonLength('content', '>', 3))
                    ->label('Deep Content Pages'),
            ])
            ->recordActions([ // Changed from ->actions() for v4/v5
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([ // Changed from ->bulkActions() for v4/v5
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('No Services Found')
            ->emptyStateDescription('Start by creating a service and adding your first Hero block.')
            ->defaultSort('created_at', 'desc');
    }
}