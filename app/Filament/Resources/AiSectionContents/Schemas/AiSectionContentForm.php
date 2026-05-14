<?php

namespace App\Filament\Resources\AiSectionContents\Schemas;

// --- FILAMENT V4 ROOT & LAYOUT NAMESPACES ---
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

// --- FILAMENT V4 INPUT NAMESPACES ---
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;

class AiSectionContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('AI Digital World Content (Left Side)')
                    ->description('Manage the text and buttons for the left side. The AI graphic on the right will remain static.')
                    ->schema([
                        
                        // Title Group
                        Section::make('Main Heading & Subtitle')
                            ->schema([
                                TextInput::make('title_white')
                                    ->label('Top Title (White Text)')
                                    ->placeholder('e.g., EXPLORE NEW HEIGHTS –')
                                    ->required(),
                                    
                                TextInput::make('title_pink')
                                    ->label('Bottom Title (Pink Text)')
                                    ->placeholder('e.g., STEP INTO THE AI DIGITAL WORLD')
                                    ->required(),
                                    
                                TextInput::make('subtitle')
                                    ->label('Section Subtitle')
                                    ->placeholder('e.g., Enhance AI visibility, accelerate growth...')
                                    ->columnSpanFull(),
                            ])->columns(2),

                        // Content Group
                        Section::make('Body Paragraphs')
                            ->schema([
                                // Using RichEditor instead of Textarea so you can bold words like "ASTHA"
                                RichEditor::make('paragraph_1')
                                    ->label('First Paragraph')
                                    ->toolbarButtons(['bold', 'italic', 'link'])
                                    ->required(),
                                    
                                RichEditor::make('paragraph_2')
                                    ->label('Second Paragraph')
                                    ->toolbarButtons(['bold', 'italic', 'link']),
                                    
                                RichEditor::make('paragraph_3')
                                    ->label('Third Paragraph')
                                    ->toolbarButtons(['bold', 'italic', 'link']),
                            ]),

                        // Button Group
                        Grid::make(2)
                            ->schema([
                                TextInput::make('button_text')
                                    ->label('Button Text')
                                    ->default('GET IN TOUCH')
                                    ->required(),
                                    
                                TextInput::make('button_link')
                                    ->label('Button URL/Link')
                                    ->url()
                                    ->nullable(),
                            ]),

                        // Status Toggle
                        Toggle::make('is_active')
                            ->label('Visible on Website')
                            ->helperText('Toggle this off to temporarily hide this section.')
                            ->default(true),
                    ]),
            ]);
    }
}