<?php

namespace App\Filament\Resources\ServiceSections;

use App\Filament\Resources\ServiceSections\Pages\CreateServiceSection;
use App\Filament\Resources\ServiceSections\Pages\EditServiceSection;
use App\Filament\Resources\ServiceSections\Pages\ListServiceSections;
use App\Filament\Resources\ServiceSections\Schemas\ServiceSectionForm;
use App\Filament\Resources\ServiceSections\Tables\ServiceSectionsTable;
use App\Models\ServiceSection;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServiceSectionResource extends Resource
{
    protected static ?string $model = ServiceSection::class;

    // ✅ FIXED: Changed to Briefcase icon to represent "Services"
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    // Filament v4 requires UnitEnum in the union type for the navigation group
    protected static string|UnitEnum|null $navigationGroup = 'Service Setting';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'title'; 

    public static function form(Schema $schema): Schema
    {
        // Delegating form logic to your dedicated schema class
        return ServiceSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        // Delegating table logic to your dedicated table class
        return ServiceSectionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServiceSections::route('/'),
            'create' => CreateServiceSection::route('/create'),
            'edit' => EditServiceSection::route('/{record}/edit'),
        ];
    }
}