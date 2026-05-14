<?php

namespace App\Filament\Resources\AiSectionContents\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class AiSectionContentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Displays the white part of the heading
                TextColumn::make('title_white')
                    ->label('Main Title (White)')
                    ->searchable()
                    ->sortable(),

                // Displays the pink part of the heading
                TextColumn::make('title_pink')
                    ->label('Highlight Title (Pink)')
                    ->searchable(),

                // Quick toggle to show/hide this section on the frontend
                ToggleColumn::make('is_active')
                    ->label('Status'),

                // Shows when it was last modified
                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // You can add filters here later if you have many records
            ])
            ->actions([
                // Individual record actions
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                // Actions for multiple selected records
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}