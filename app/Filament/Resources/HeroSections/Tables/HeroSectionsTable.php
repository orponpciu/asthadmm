<?php

namespace App\Filament\Resources\HeroSections\Tables;

// --- UNIFIED V4 ACTIONS NAMESPACES ---
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;

// --- TABLE LAYOUT NAMESPACES ---
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HeroSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ToggleColumn::make('is_active')
                    ->label('Active')
                    ->sortable()
                    ->tooltip('Toggle to show or hide this section on the live website'),

                TextColumn::make('headline')
                    ->label('Main Headline')
                    ->searchable()
                    ->limit(50),

                TextColumn::make('subheadline')
                    ->label('Sub Headline')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}