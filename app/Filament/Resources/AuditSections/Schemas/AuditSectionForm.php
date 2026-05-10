<?php

namespace App\Filament\Resources\AuditSections\Schemas;

// --- FILAMENT V4 ROOT & LAYOUT NAMESPACES ---
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid; // <-- Grid moved to Schemas!

// --- FILAMENT V4 INPUT NAMESPACES (These remain in Forms) ---
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\CheckboxList;

class AuditSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Audit Content (Left Side)')
                    ->description('Manage the text, button, and icons for the left side of the audit section.')
                    ->schema([
                        
                        // Title Group
                        Section::make('Main Heading')
                            ->schema([
                                TextInput::make('heading_start')
                                    ->label('Text before highlight')
                                    ->required(),
                                TextInput::make('heading_highlight')
                                    ->label('Highlighted Text (inside span)')
                                    ->required(),
                                TextInput::make('heading_end')
                                    ->label('Text after highlight')
                                    ->required(),
                            ])->columns(3),

                        // Content Group
                        Textarea::make('paragraph_one')
                            ->label('First Paragraph')
                            ->rows(4)
                            ->required(),
                            
                        Textarea::make('paragraph_two')
                            ->label('Second Paragraph')
                            ->rows(3)
                            ->required(),

                        // Button Group
                        Grid::make(2)
                            ->schema([
                                TextInput::make('button_text')
                                    ->label('Button Text')
                                    ->required(),
                                TextInput::make('button_url')
                                    ->label('Button URL/Link')
                                    ->url()
                                    ->required(),
                            ]),

                        // Icons Toggle
                        CheckboxList::make('active_icons')
                            ->label('Visible Tech Icons')
                            ->options([
                                'google_ads' => 'Google Ads',
                                'analytics' => 'Google Analytics',
                                'instagram' => 'Instagram',
                                'facebook' => 'Facebook',
                                'youtube' => 'YouTube',
                            ])
                            ->columns(3)
                            ->gridDirection('row'),
                    ]),
            ]);
    }
}