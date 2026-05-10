<?php

namespace App\Filament\Resources\AuditSections\Tables;

// 1. These are the EXACT imports required for Tables in Filament.
// Make sure no "Filament\Actions\..." are left at the top of this file.
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class AuditSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('heading_start')
                    ->label('Heading Start')
                    ->limit(30)
                    ->searchable(),
                    
                TextColumn::make('heading_highlight')
                    ->label('Highlighted Text')
                    ->badge()
                    ->color('primary'),

                TextColumn::make('button_text')
                    ->label('Button'),
                    
                TextColumn::make('active_icons')
                    ->label('Visible Icons')
                    ->badge()
                    ->separator(','),
            ])
            ->filters([
                //
            ])
            ->actions([
                // This relies on: use Filament\Tables\Actions\EditAction;
                EditAction::make(),
            ])
            ->bulkActions([
                // This relies on: use Filament\Tables\Actions\BulkActionGroup;
                // and: use Filament\Tables\Actions\DeleteBulkAction;
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}