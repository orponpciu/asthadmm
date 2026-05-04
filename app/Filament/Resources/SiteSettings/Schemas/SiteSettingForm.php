<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

// --- FILAMENT V4 NAMESPACES ---
use Filament\Schemas\Components\Section;   // Layouts moved to Schemas in v4
use Filament\Forms\Components\FileUpload;  // Inputs stayed in Forms
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Branding')
                    ->description('Manage your public-facing imagery.')
                    ->schema([
                        FileUpload::make('favicon')
                            ->image()
                            ->directory('settings')
                            ->label('Favicon (Browser Tab Icon)'),
                        FileUpload::make('logo')
                            ->image()
                            ->directory('settings')
                            ->label('Website Logo'),
                    ])->columns(2),

                Section::make('Navigation Menu')
                    ->description('Add or remove links from the top header.')
                    ->schema([
                        Repeater::make('nav_links')
                            ->schema([
                                TextInput::make('label')
                                    ->required()
                                    ->label('Menu Text (e.g., About)'),
                                TextInput::make('url')
                                    ->required()
                                    ->label('Link URL (e.g., /about)'),
                            ])
                            ->columns(2)
                            ->addActionLabel('Add Menu Item')
                            ->reorderable(),
                    ]),

                Section::make('Call to Action Button')
                    ->description('Control the button on the far right of the header.')
                    ->schema([
                        TextInput::make('cta_text')
                            ->label('Button Text')
                            ->placeholder('CALL NOW ➔'),
                        TextInput::make('cta_link')
                            ->label('Button Link/Number')
                            ->placeholder('tel:+1234567890'),
                    ])->columns(2),
            ]);
    }
}