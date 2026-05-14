<?php

namespace App\Filament\Resources\AuditContacts;

use App\Filament\Resources\AuditContacts\Pages\CreateAuditContact;
use App\Filament\Resources\AuditContacts\Pages\EditAuditContact;
use App\Filament\Resources\AuditContacts\Pages\ListAuditContacts;
use App\Filament\Resources\AuditContacts\Pages\ViewAuditContact;
use App\Filament\Resources\AuditContacts\Schemas\AuditContactForm;
use App\Filament\Resources\AuditContacts\Schemas\AuditContactInfolist;
use App\Filament\Resources\AuditContacts\Tables\AuditContactsTable;
use App\Models\AuditContact;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AuditContactResource extends Resource
{
    protected static ?string $model = AuditContact::class;

    protected static ?string $recordTitleAttribute = 'Name';

    // ✅ FIXED: Using methods instead of properties prevents all strict-typing Fatal Errors
    public static function getNavigationIcon(): string | \BackedEnum | null
    {
        return Heroicon::OutlinedUsers;
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Audit Options';
    }

    public static function form(Schema $schema): Schema
    {
        return AuditContactForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AuditContactInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AuditContactsTable::configure($table);
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
            'index' => ListAuditContacts::route('/'),
            'create' => CreateAuditContact::route('/create'),
            'view' => ViewAuditContact::route('/{record}'),
            'edit' => EditAuditContact::route('/{record}/edit'),
        ];
    }
}