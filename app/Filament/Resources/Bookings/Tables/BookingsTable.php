<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                    
                TextColumn::make('email')
                    ->searchable()
                    ->copyable() // Adds a handy "copy to clipboard" icon
                    ->copyMessage('Email address copied')
                    ->icon('heroicon-m-envelope'),
                    
                TextColumn::make('phone')
                    ->searchable(),
                    
                TextColumn::make('company')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true), // Hides it to save screen space, but keeps it toggleable
                    
                TextColumn::make('service')
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                    
                TextColumn::make('created_at')
                    ->label('Submitted On')
                    ->dateTime('M j, Y g:i A')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(), // Essential for reading the long 'message' field
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}