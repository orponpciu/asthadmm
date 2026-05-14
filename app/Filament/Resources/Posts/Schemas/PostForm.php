<?php

namespace App\Filament\Resources\Posts\Schemas;

// --- FILAMENT V4 ROOT & LAYOUT NAMESPACES ---
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group; // Corrected namespace for v4 Schemas

// --- FILAMENT V4 INPUT NAMESPACES ---
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3) // Sets the base grid to 3 columns
            ->components([
                
                // ========================================================
                // MAIN BODY COLUMN (Left side: 2/3 width)
                // ========================================================
                Group::make([
                    // Article Content Section
                    Section::make('Article Content')
                        ->icon('heroicon-o-document-text')
                        ->columns(2)
                        ->schema([
                            TextInput::make('title')
                                ->label('Post Title')
                                ->placeholder('Enter the article heading...')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state)))
                                ->columnSpan(1),
                                
                            TextInput::make('slug')
                                ->label('URL Slug')
                                ->placeholder('auto-generated-slug')
                                ->required()
                                ->maxLength(255)
                                ->unique(ignoreRecord: true)
                                ->columnSpan(1),
                                
                            RichEditor::make('content')
                                ->label('Article Body')
                                ->required()
                                ->fileAttachmentsDirectory('post-content-images')
                                ->columnSpanFull(),
                        ]),
                    
                    // SEO Section
                    Section::make('Search Engine Optimization (SEO)')
                        ->description('Optimize how this insight article appears on Google Search results.')
                        ->icon('heroicon-o-globe-alt')
                        ->collapsible()
                        ->columns(2)
                        ->schema([
                            TextInput::make('meta_title')
                                ->label('SEO Meta Title')
                                ->placeholder('e.g., Best Digital Marketing Strategies in Dubai')
                                ->maxLength(60)
                                ->live()
                                ->hint(fn ($state) => strlen($state ?? '') . ' / 60 chars')
                                ->columnSpan(1),
                                
                            TagsInput::make('meta_keywords')
                                ->label('SEO Meta Keywords')
                                ->placeholder('Add key phrase...')
                                ->separator(',')
                                ->columnSpan(1),
                                
                            Textarea::make('meta_description')
                                ->label('SEO Meta Description')
                                ->placeholder('Enter a summary snippet...')
                                ->maxLength(160)
                                ->rows(3)
                                ->live()
                                ->hint(fn ($state) => strlen($state ?? '') . ' / 160 chars')
                                ->columnSpanFull(),
                        ]),
                ])->columnSpan(['lg' => 2]), // Spans 2 columns on desktop

                // ========================================================
                // SIDEBAR COLUMN (Right side: 1/3 width)
                // ========================================================
                Group::make([
                    Section::make('Publishing Context')
                        ->icon('heroicon-o-paper-airplane')
                        ->schema([
                            Select::make('post_category_id')
                                ->label('Post Category')
                                ->relationship('category', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),
                                
                            DatePicker::make('published_at')
                                ->label('Publish Calendar Date')
                                ->native(false)
                                ->default(now())
                                ->required(),
                                
                            Toggle::make('is_published')
                                ->label('Display Live on Website')
                                ->helperText('If turned off, this post is saved as a hidden draft.')
                                ->default(true),
                        ]),
                    
                    Section::make('Cover Asset')
                        ->description('Upload the landscape card picture.')
                        ->icon('heroicon-o-photo')
                        ->schema([
                            FileUpload::make('featured_image')
                                ->label('')
                                ->image()
                                ->directory('featured-images')
                                ->imageEditor()
                                ->required(),

                            // --- NEW ALT TEXT FIELD ADDED HERE ---
                            TextInput::make('featured_image_alt')
                                ->label('Image Alt Text')
                                ->helperText('Describe the image for screen readers and SEO.')
                                ->maxLength(255),
                        ]),
                ])->columnSpan(['lg' => 1]), // Spans 1 column on desktop
                
            ]);
    }
}