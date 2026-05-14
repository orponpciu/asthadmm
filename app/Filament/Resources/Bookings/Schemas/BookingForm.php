<?php

namespace App\Filament\Resources\Bookings\Schemas;

// --- FILAMENT V4 ROOT & LAYOUT NAMESPACES ---
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

// --- FILAMENT V4 INPUT NAMESPACES ---
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Client Details')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                            
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                            
                        TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                            
                        TextInput::make('company')
                            ->maxLength(255),
                    ])->columns(2),

                Section::make('Inquiry Information')
                    ->schema([
                        Select::make('service')
                            ->options([
                                'seo' => 'Search Engine Optimization',
                                'smm' => 'Social Media Marketing',
                                'ppc' => 'Search Advertising (PPC)',
                            ])
                            ->required()
                            ->columnSpanFull(),
                            
                        Textarea::make('message')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}