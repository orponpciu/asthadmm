<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Schemas\Schema;

// Important: Add this import for the auto-slug to work
use Illuminate\Support\Str;

// Layout Wrappers
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

// Functional Form Components & Fields
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TagsInput;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 1. BASIC & SEO INFORMATION
                Section::make('Service Basic & SEO Information')
                    ->description('Manage the general settings and search engine visibility for this service.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Service Page Title')
                                    ->required()
                                    ->live(onBlur: true)
                                    // Removed the strict "Set" type-hint here to fix the 500 error
                                    ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state))),
                                
                                TextInput::make('slug')
                                    ->label('URL Slug')
                                    ->required()
                                    ->unique(ignoreRecord: true), // Ensures slugs don't duplicate in the DB
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('seo_title')
                                    ->label('Meta Title')
                                    ->placeholder('Focus Keyword - Brand Name')
                                    ->helperText('Recommended: 50-60 characters.')
                                    ->maxLength(70),
                                
                                TagsInput::make('seo_keywords')
                                    ->label('Focus Keywords')
                                    ->placeholder('Add keyword and press enter')
                                    ->helperText('Add the main keywords you want to rank for.'),
                            ]),

                        Textarea::make('seo_description')
                            ->label('Meta Description')
                            ->placeholder('Brief summary of the page for search results...')
                            ->helperText('Recommended: 150-160 characters.')
                            ->rows(3)
                            ->maxLength(165)
                            ->columnSpanFull(),
                    ]),

                // 2. PAGE CONTENT BUILDER
                Builder::make('content')
                    ->label('Page Sections')
                    ->blocks([
                        
                        // 1. HERO BLOCK
                        Builder\Block::make('hero')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                TextInput::make('heading')->required(),
                                Textarea::make('subheading'),
                                TextInput::make('button_text'),
                                TextInput::make('button_url'),
                                FileUpload::make('image')
                                    ->image()
                                    ->directory('services/hero'),
                                ColorPicker::make('particle_color')
                                    ->default('#e3003a'),
                            ])->columns(2),

                        // 2. FEATURE BLOCK
                        Builder\Block::make('feature_block')
                            ->icon('heroicon-o-rectangle-stack')
                            ->schema([
                                TextInput::make('sub_title'),
                                TextInput::make('title')->required(),
                                Textarea::make('description'),
                                Repeater::make('points')
                                    ->schema([
                                        TextInput::make('item')
                                    ])
                                    ->createItemButtonLabel('Add Bullet Point'),
                                FileUpload::make('image')->image()->directory('services/features'),
                                Toggle::make('is_reversed')
                                    ->label('Reverse Layout')
                                    ->default(false),
                                TextInput::make('btn_text'),
                                TextInput::make('btn_link'),
                            ])->columns(2),

                        // 3. DARK MIDDLE BANNER
                        Builder\Block::make('mid_banner')
                            ->icon('heroicon-o-presentation-chart-bar')
                            ->schema([
                                TextInput::make('title'),
                                Textarea::make('description'),
                                FileUpload::make('bg_image')->image(),
                                TextInput::make('btn_text'),
                                TextInput::make('btn_link'),
                            ]),

                        // 4. FAQ SECTION
                        Builder\Block::make('faq')
                            ->icon('heroicon-o-question-mark-circle')
                            ->schema([
                                TextInput::make('section_title')->default('Frequently Asked Questions'),
                                Repeater::make('questions')
                                    ->schema([
                                        TextInput::make('question')->required(),
                                        Textarea::make('answer')->required(),
                                    ])
                                    ->collapsible(),
                            ]),

                        // 5. PROMISES SECTION
                        Builder\Block::make('promises')
                            ->icon('heroicon-o-check-badge')
                            ->schema([
                                TextInput::make('section_title')->default('WE PROMISE'),
                                Repeater::make('cards')
                                    ->schema([
                                        TextInput::make('title')->required(),
                                        Textarea::make('description')->required(),
                                    ])
                                    ->grid(3),
                            ]),
                    ])
                    ->collapsible()
                    ->cloneable()
                    ->columnSpanFull(),
            ]);
    }
}