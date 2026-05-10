<?php

namespace App\Filament\Resources\AuditSections;

use App\Filament\Resources\AuditSections\Pages\CreateAuditSection;
use App\Filament\Resources\AuditSections\Pages\EditAuditSection;
use App\Filament\Resources\AuditSections\Pages\ListAuditSections;
use App\Filament\Resources\AuditSections\Schemas\AuditSectionForm;
use App\Filament\Resources\AuditSections\Tables\AuditSectionsTable;
use App\Models\AuditSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AuditSectionResource extends Resource
{
    protected static ?string $model = AuditSection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Name';

    public static function form(Schema $schema): Schema
    {
        return AuditSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AuditSectionsTable::configure($table);
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
            'index' => ListAuditSections::route('/'),
            'create' => CreateAuditSection::route('/create'),
            'edit' => EditAuditSection::route('/{record}/edit'),
        ];
    }
}
