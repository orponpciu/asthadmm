<?php

namespace App\Filament\Resources\RecognitionSections\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class RecognitionSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('section_title')
                    ->label('Section Title')
                    ->searchable()
                    ->sortable(),

                // This safely counts how many platforms are inside the JSON array
                TextColumn::make('platforms')
                    ->label('Logos Count')
                    ->formatStateUsing(fn ($state) => count($state ?? []) . ' Platforms')
                    ->badge()
                    ->color('info'),

                ToggleColumn::make('is_active')
                    ->label('Visible on Website'),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            // Note: Changed from recordActions to standard actions() 
            // and toolbarActions to bulkActions() for correct Filament syntax
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