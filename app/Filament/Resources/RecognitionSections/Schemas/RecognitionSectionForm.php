<?php

namespace App\Filament\Resources\RecognitionSections\Schemas;

// --- FILAMENT V4 ROOT & LAYOUT NAMESPACES ---
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

// --- FILAMENT V4 INPUT NAMESPACES ---
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\ColorPicker;

class RecognitionSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                // 1. General Settings
                Section::make('Recognition Banner Settings')
                    ->description('Manage the section title and overall visibility.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('section_title')
                                    ->label('Section Title (Pink Text)')
                                    ->default('RECOGNIZED BY LEADING INDUSTRY PLATFORMS')
                                    ->required(),
                                    
                                Toggle::make('is_active')
                                    ->label('Visible on Website')
                                    ->default(true),
                            ]),
                    ]),

                // 2. Dynamic Platforms Array
                Section::make('Platform Logos')
                    ->description('Add and manage the recognized platform cards (Clutch, Trustpilot, etc.).')
                    ->schema([
                        Repeater::make('platforms')
                            ->label('') // Hiding the default label for a cleaner UI
                            ->addActionLabel('Add New Platform')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Platform Name (Alt Text)')
                                            ->placeholder('e.g., Clutch')
                                            ->required(),
                                            
                                        TextInput::make('link')
                                            ->label('URL / Link')
                                            ->placeholder('https://...')
                                            ->url()
                                            ->nullable(),
                                            
                                        FileUpload::make('logo')
                                            ->label('Platform Logo Image')
                                            ->image()
                                            ->directory('recognition-logos')
                                            ->required()
                                            ->columnSpan(1),
                                            
                                        ColorPicker::make('bg_color')
                                            ->label('Card Background Color')
                                            ->helperText('Leave empty for default dark card. (e.g., White for DesignRush, Blue for sortlist).')
                                            ->nullable()
                                            ->columnSpan(1),
                                    ]),
                            ])
                            // This makes the repeater blocks collapsible
                            ->collapsible()
                            // This titles the collapsed blocks with the platform name (e.g., "Clutch") automatically!
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null),
                    ]),
            ]);
    }
}