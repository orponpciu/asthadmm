<?php

namespace App\Filament\Resources\FooterSettings\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section; 
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;

class FooterSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 1. Brand & Socials Section
                Section::make('Brand & Socials')
                    ->description('Manage your logo, tagline, and social media links.')
                    ->schema([
                        FileUpload::make('logo')
                            ->image()
                            ->directory('footer')
                            ->columnSpanFull(),
                            
                        TextInput::make('tagline')
                            ->label('Tagline')
                            ->placeholder('e.g. YOUR DIGITAL GROWTH EXPERTS')
                            ->columnSpanFull(),
                            
                        Repeater::make('social_links')
                            ->label('Social Media Links')
                            ->schema([
                                TextInput::make('icon')
                                    ->label('Icon Text (e.g. f, ig, in)')
                                    ->required(),
                                TextInput::make('url')
                                    ->label('Profile URL')
                                    ->url()
                                    ->required(),
                            ])
                            ->columns(2)
                            ->columnSpanFull(),
                    ]),

                // 2. Quick Links Section
                Section::make('Quick Links')
                    ->schema([
                        TextInput::make('quick_links_title')
                            ->label('Section Title')
                            ->default('QUICK LINKS')
                            ->required(),
                            
                        Repeater::make('quick_links')
                            ->label('Links')
                            ->schema([
                                TextInput::make('label')->required(),
                                TextInput::make('url')->required(),
                            ])
                            ->columns(2)
                            ->columnSpanFull(),
                    ]),

                // 3. Services Section
                Section::make('Services')
                    ->schema([
                        TextInput::make('services_title')
                            ->label('Section Title')
                            ->default('SERVICES')
                            ->required(),
                            
                        Repeater::make('services')
                            ->label('Service Links')
                            ->schema([
                                TextInput::make('label')->required(),
                                TextInput::make('url')->required(),
                            ])
                            ->columns(2)
                            ->columnSpanFull(),
                    ]),

                // 4. Contact Information & Map
                Section::make('Contact Information & Map')
                    ->schema([
                        TextInput::make('contact_title')
                            ->label('Section Title')
                            ->default('CONTACT US')
                            ->required(),
                            
                        Repeater::make('contact_items')
                            ->label('Contact Details')
                            ->schema([
                                TextInput::make('icon')
                                    ->label('Emoji/Icon (e.g. ✉, 📞, 📍)')
                                    ->required(),
                                TextInput::make('label')
                                    ->label('Title (e.g. EMAIL ADDRESS)')
                                    ->required(),
                                TextInput::make('value')
                                    ->label('Value (e.g. info@asthadmm.com)')
                                    ->required(),
                            ])
                            ->columns(3)
                            ->columnSpanFull(),
                            
                        Textarea::make('map_url')
                            ->label('Google Maps Embed URL (Provide only the src link)')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}