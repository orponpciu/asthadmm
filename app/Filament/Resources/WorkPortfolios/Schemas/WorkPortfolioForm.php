<?php

namespace App\Filament\Resources\WorkPortfolios\Schemas;

// --- FILAMENT V4 NAMESPACES ---
use Filament\Schemas\Components\Section;   // Layouts moved to Schemas
use Filament\Forms\Components\FileUpload;  // Inputs stayed in Forms
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class WorkPortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3) // Optional: Sets a 3-column grid for the whole page
            ->components([
                
                Section::make('Core Details')
                    ->description('Primary information and tags for the portfolio item.')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (?string $state, callable $set) => $set('slug', Str::slug($state ?? ''))),
                        
                        TextInput::make('slug')
                            ->required()
                            ->unique('work_portfolios', 'slug', ignoreRecord: true),

                        TextInput::make('tagline')
                            ->default('Case Study')
                            ->placeholder('e.g., Case Study'),

                        TagsInput::make('services_tags')
                            ->label('Services / Tags')
                            ->placeholder('Add a tag and press enter'),
                    ])
                    ->columnSpan(2),

                Section::make('Visuals & Links')
                    ->description('Hero image and call-to-action.')
                    ->schema([
                        FileUpload::make('hero_image')
                            ->image()
                            ->directory('portfolio')
                            ->label('Cover Image'),

                        TextInput::make('cta_link')
                            ->label('Call to Action Link')
                            ->url()
                            ->default('#'),
                    ])
                    ->columnSpan(1),

                Section::make('The Narrative')
                    ->schema([
                        Textarea::make('description')
                            ->label('Project Overview')
                            ->rows(5)
                            ->required(),
                    ])
                    ->columnSpan(3),

                Section::make('Performance Metrics')
                    ->description('Add the statistical cards shown in the stats container.')
                    ->schema([
                        Repeater::make('stats')
                            ->schema([
                                TextInput::make('number')
                                    ->placeholder('e.g., 12+')
                                    ->required(),
                                TextInput::make('label')
                                    ->placeholder('e.g., Industry Keywords')
                                    ->required(),
                            ])
                            ->columns(2)
                            ->addActionLabel('Add Metric')
                            ->reorderable(),
                    ])
                    ->columnSpan(3),

                Section::make('Execution Steps')
                    ->description('Define the "How We Achieved It" section.')
                    ->schema([
                        Repeater::make('execution_steps')
                            ->schema([
                                TextInput::make('title')
                                    ->placeholder('Step Title')
                                    ->required(),
                                Textarea::make('description')
                                    ->placeholder('Detailed explanation of the step')
                                    ->rows(3)
                                    ->required(),
                            ])
                            ->addActionLabel('Add Step')
                            ->reorderable(),
                    ])
                    ->columnSpan(3),

            ]);
    }
}