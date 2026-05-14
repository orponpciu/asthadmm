<?php

namespace App\Filament\Resources\Testimonials\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class TestimonialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('author')
                    ->label('Client Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('company')
                    ->label('Company')
                    ->searchable(),

                TextColumn::make('role')
                    ->label('Position'),

                TextColumn::make('quote')
                    ->label('Testimonial Text')
                    ->limit(50) // Keeps the table clean
                    ->tooltip(fn ($record): string => $record->quote),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            // Enable drag-and-drop reordering for your slider sequence
            ->reorderable('sort_order') 
            ->defaultSort('sort_order')
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}