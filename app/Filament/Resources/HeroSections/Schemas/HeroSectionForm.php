<?php

namespace App\Filament\Resources\HeroSections\Schemas;

// --- FILAMENT V4 NAMESPACES ---
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Get; // <-- FIXED IMPORT FOR V4
use Filament\Schemas\Schema;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Section Visibility')
                    ->description('Toggle whether this section appears on the live website.')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Show Hero Section')
                            ->default(true),
                    ]),

                Section::make('Main Content')
                    ->description('The primary text for the hero banner.')
                    ->schema([
                        TextInput::make('headline')
                            ->label('Main Headline')
                            ->default('EXPLORE NEW HEIGHTS')
                            ->required(),
                        TextInput::make('subheadline')
                            ->label('Sub Headline')
                            ->default('TOP DIGITAL MARKETING MANAGEMENT AGENCY IN DUBAI UAE FOR GROWTH')
                            ->required(),
                    ])->columns(2),

                Section::make('Statistics Counters')
                    ->description('Enter your 4 counters here (e.g., 15+, 22+, 4200+, 95%).')
                    ->schema([
                        Repeater::make('stats')
                            ->schema([
                                TextInput::make('number')
                                    ->numeric()
                                    ->required()
                                    ->label('Target Number (e.g., 15)'),
                                TextInput::make('symbol')
                                    ->label('Symbol (e.g., +, %, or leave blank)'),
                                TextInput::make('label')
                                    ->required()
                                    ->label('Text (e.g., YEARS OF EXPERIENCE)'),
                            ])
                            ->columns(3)
                            ->addActionLabel('Add New Stat Counter')
                            ->reorderable(),
                    ]),

                Section::make('Partner Logos')
                    ->description('Select a pre-built SVG badge or upload a custom logo.')
                    ->schema([
                        Repeater::make('partners')
                            ->schema([
                                Select::make('badge_type')
                                    ->label('Badge / Logo Type')
                                    ->options([
                                        'meta' => 'Meta SVG Logo',
                                        'google' => 'Google SVG Logo',
                                        'google_ads' => 'Google Ads SVG Badge',
                                        'shopping_ads' => 'Shopping Ads SVG Badge',
                                        'custom' => 'Upload Custom Image',
                                    ])
                                    ->required()
                                    ->live() // Triggers UI update when changed
                                    ->default('custom'),

                                TextInput::make('name')
                                    ->label('Partner Name (Text inside badge)')
                                    ->required(),

                                TextInput::make('role')
                                    ->label('Role (e.g., Business Partner)'),

                                FileUpload::make('logo')
                                    ->image()
                                    ->directory('partners')
                                    ->label('Custom Logo Image')
                                    // Uses the new v4 Get utility
                                    ->hidden(fn (Get $get) => $get('badge_type') !== 'custom'),
                            ])
                            ->columns(4)
                            ->addActionLabel('Add Partner Card')
                            ->reorderable(),
                    ]),
            ]);
    }
}