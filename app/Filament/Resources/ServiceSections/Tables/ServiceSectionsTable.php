<?php

namespace App\Filament\Resources\ServiceSections\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;     // Namespace for Table row buttons
use Filament\Actions\DeleteAction;   // Namespace for Table row buttons
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
class ServiceSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Service Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
            ])
            ->reorderable('sort_order') 
            ->defaultSort('sort_order', 'asc')
            ->filters([
                //
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