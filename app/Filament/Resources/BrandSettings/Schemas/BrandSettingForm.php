<?php

namespace App\Filament\Resources\BrandSettings\Schemas;

// --- FILAMENT V4 NAMESPACES ---
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Utilities\Get; // V4 Get Utility
use Filament\Schemas\Schema;

class BrandSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Section Visibility')
                    ->description('Toggle whether the entire brand slider appears on the live website.')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Show Brand Slider')
                            ->default(true),
                    ]),

                Section::make('Brands & Partners')
                    ->description('Add logos to the infinite slider track. Choose a pre-built custom badge or upload your own image.')
                    ->schema([
                        Repeater::make('brands')
                            ->schema([
                                Select::make('brand_type')
                                    ->label('Logo Style')
                                    ->options([
                                        'kilian' => 'Kilian (Custom Text)',
                                        'alshaya' => 'Alshaya Group (Custom Design)',
                                        'majid' => 'Majid Al Futtaim (Custom Design)',
                                        'pandora' => 'Pandora (Custom Text)',
                                        'piaget' => 'Piaget (Custom Text)',
                                        'chanel' => 'Chanel (SVG Logo)',
                                        'tommy' => 'Tommy Hilfiger (Custom Block)',
                                        'custom' => 'Upload Custom Image',
                                    ])
                                    ->required()
                                    ->live() // Triggers UI update to show/hide upload field
                                    ->default('custom'),

                                TextInput::make('name')
                                    ->label('Brand Name (For alt text / labels)')
                                    ->required(),

                                FileUpload::make('logo')
                                    ->image()
                                    ->directory('brands')
                                    ->label('Upload Custom Logo')
                                    // Only show this field if "Upload Custom Image" is selected
                                    ->hidden(fn (Get $get) => $get('brand_type') !== 'custom'),
                            ])
                            ->columns(3)
                            ->addActionLabel('Add Brand to Slider')
                            ->reorderable(),
                    ]),
            ]);
    }
}