<?php

namespace App\Filament\Resources\Testimonials\Schemas;

// --- FILAMENT V4 NAMESPACES ---
use Filament\Schemas\Components\Section;   // Layouts moved to Schemas
use Filament\Schemas\Components\Grid;      // Layouts moved to Schemas
use Filament\Forms\Components\TextInput;   // Inputs stayed in Forms
use Filament\Forms\Components\Textarea;    // Inputs stayed in Forms
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Testimonial Content')
                    ->description('Enter the client feedback as it should appear on the slide.')
                    ->schema([
                        Textarea::make('quote')
                            ->label('The Testimonial Text')
                            ->placeholder('Enter the client feedback here...')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),

                        Grid::make(3)->schema([
                            TextInput::make('author')
                                ->label('Author Name')
                                ->placeholder('e.g., Murali Krishnan N')
                                ->required()
                                ->maxLength(255),

                            TextInput::make('role')
                                ->label('Job Title')
                                ->placeholder('e.g., Division Manager')
                                ->required()
                                ->maxLength(255),

                            TextInput::make('company')
                                ->label('Company')
                                ->placeholder('e.g., CMS Printing Press')
                                ->required()
                                ->maxLength(255),
                        ]),

                        TextInput::make('sort_order')
                            ->label('Slider Position')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers show up first in the carousel.'),
                    ])
                    ->icon('heroicon-o-chat-bubble-left-right'),
            ]);
    }
}