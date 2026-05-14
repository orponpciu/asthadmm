<?php

namespace App\Filament\Resources\PostCategories\Schemas;

// --- FILAMENT V4 ROOT & LAYOUT NAMESPACES ---
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

// --- FILAMENT V4 INPUT NAMESPACES ---
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TagsInput;
use Illuminate\Support\Str;

class PostCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                // 1. General Info Section
                Section::make('Category Details')
                    ->description('Basic information for the post category.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Category Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state))),
                                    
                                TextInput::make('slug')
                                    ->label('URL Slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true), 
                            ]),
                            
                        Toggle::make('is_active')
                            ->label('Active Category')
                            ->helperText('Turn this off to hide this category from the frontend.')
                            ->default(true),
                    ]),

                // 2. SEO Optimization Section
                Section::make('SEO Optimization')
                    ->description('Settings for search engines like Google.')
                    ->collapsible() 
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('meta_title')
                                    ->label('Meta Title')
                                    ->helperText('If left blank, the category name will be used.')
                                    ->maxLength(60),
                                    
                                TagsInput::make('meta_keywords')
                                    ->label('Meta Keywords')
                                    ->helperText('Type a keyword and press Enter (or comma).')
                                    ->separator(','),
                            ]),
                            
                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->helperText('Keep it under 160 characters for the best SEO performance.')
                            ->maxLength(160)
                            ->rows(3),
                    ]),
            ]);
    }
}