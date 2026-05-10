<?php

namespace App\Filament\Resources\AuditContacts\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class AuditContactsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // 1. You must add columns here for them to show in the UI
                TextColumn::make('full_name')
                    ->label('Full Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('company_name')
                    ->label('Company')
                    ->searchable(),

                TextColumn::make('mobile_number')
                    ->label('Phone'),

                TextColumn::make('created_at')
                    ->label('Submitted On')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            // 2. Use 'actions' instead of 'recordActions'
            ->actions([
                ViewAction::make(),
                EditAction::make(),
            ])
            // 3. Use 'bulkActions' instead of 'toolbarActions'
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}