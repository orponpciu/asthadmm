<?php

namespace App\Filament\Resources\AuditContacts\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section; // Layouts are now in Schemas
use Filament\Forms\Components\TextInput; // Inputs remain in Forms

class AuditContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Audit Request Details')
                    ->description('Information submitted via the landing page form.')
                    ->schema([
                        TextInput::make('full_name')
                            ->label('Full Name')
                            ->disabled() // Keeps the lead data read-only
                            ->columnSpanFull(),
                            
                        TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->disabled(),
                            
                        TextInput::make('company_name')
                            ->label('Company Name')
                            ->disabled(),
                            
                        TextInput::make('mobile_number')
                            ->label('Mobile Number')
                            ->tel()
                            ->disabled(),
                    ])
                    ->columns(2),
            ]);
    }
}