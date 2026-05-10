<?php

namespace App\Filament\Resources\ServiceSections\Schemas;

use Filament\Schemas\Schema; 
use Filament\Schemas\Components\Section; // Updated Namespace
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class ServiceSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Service Card Details')
                    ->description('Manage the content for the service cards on the frontend.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Service Title')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Service Description')
                            ->required()
                            ->rows(3),

                        TextInput::make('custom_link')
                            ->label('Manual Link (URL)')
                            ->placeholder('https://example.com'),

                        Textarea::make('icon_svg')
                            ->label('SVG Icon Code')
                            ->required()
                            ->rows(5)
                            ->helperText('Paste the raw <svg> code here.'),

                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
            ]);
    }
}