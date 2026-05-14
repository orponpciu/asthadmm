<?php

namespace App\Filament\Resources\TeamMembers\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class TeamMembersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // 1. Show the Section Title (e.g., "Meet Our Team")
                TextColumn::make('title')
                    ->label('Section Title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                // 2. Show a count of how many people are in the JSON array
                TextColumn::make('members')
                    ->label('Staff Count')
                    ->state(fn ($record): int => count($record->members ?? []))
                    ->badge()
                    ->color('success'),

                // 3. Show a preview of names inside the JSON (Optional)
                TextColumn::make('member_names')
                    ->label('Team Members')
                    ->state(fn ($record): string => 
                        collect($record->members)->pluck('name')->implode(', ')
                    )
                    ->limit(50),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([])
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