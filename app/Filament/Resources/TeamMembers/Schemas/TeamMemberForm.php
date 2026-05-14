<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Schemas\Schema;

// Layout Wrappers
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

// Functional Form Components & Fields
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater; // <-- Don't forget to import Repeater

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Team Section Settings')
                    ->description('Manage the section title and all team members here.')
                    ->schema([
                        // Optional: Let you change "MEET OUR TEAM" dynamically
                        TextInput::make('section_title')
                            ->label('Section Title')
                            ->default('MEET OUR TEAM')
                            ->required(),

                        // The Repeater allows adding MULTIPLE members
                        Repeater::make('members')
                            ->label('Team Members')
                            ->addActionLabel('Add New Member')
                            ->collapsible()
                            ->cloneable() // Lets you duplicate a member quickly
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'New Team Member')
                            ->schema([
                                
                                // 1. MEMBER DETAILS
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Full Name')
                                            ->required()
                                            ->maxLength(255),
                                            
                                        TextInput::make('role')
                                            ->label('Position / Role')
                                            ->required()
                                            ->maxLength(255),
                                    ]),

                                FileUpload::make('image')
                                    ->label('Profile Image')
                                    ->image()
                                    ->imageEditor()
                                    ->directory('team-members')
                                    ->required()
                                    ->columnSpanFull(),

                                // 2. SOCIAL MEDIA LINKS
                                Section::make('Social Media Links')
                                    ->collapsed() // Keeps the form clean by collapsing links by default
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                TextInput::make('facebook')
                                                    ->url()
                                                    ->prefixIcon('heroicon-m-link')
                                                    ->label('Facebook URL'),
                                                    
                                                TextInput::make('twitter')
                                                    ->url()
                                                    ->prefixIcon('heroicon-m-link')
                                                    ->label('Twitter URL'),
                                                    
                                                TextInput::make('linkedin')
                                                    ->url()
                                                    ->prefixIcon('heroicon-m-link')
                                                    ->label('LinkedIn URL'),
                                                    
                                                TextInput::make('instagram')
                                                    ->url()
                                                    ->prefixIcon('heroicon-m-link')
                                                    ->label('Instagram URL'),
                                            ]),
                                    ]),
                            ])
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}