<?php

namespace App\Filament\Resources\AiSectionContents;

use App\Filament\Resources\AiSectionContents\Pages\CreateAiSectionContent;
use App\Filament\Resources\AiSectionContents\Pages\EditAiSectionContent;
use App\Filament\Resources\AiSectionContents\Pages\ListAiSectionContents;
use App\Filament\Resources\AiSectionContents\Schemas\AiSectionContentForm;
use App\Filament\Resources\AiSectionContents\Tables\AiSectionContentsTable;
use App\Models\AiSectionContent;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AiSectionContentResource extends Resource
{
    protected static ?string $model = AiSectionContent::class;

    // The icon has been updated here to Sparkles, perfect for AI
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static ?string $recordTitleAttribute = 'Ai Section';

    public static function form(Schema $schema): Schema
    {
        return AiSectionContentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AiSectionContentsTable::configure($table);
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
            'index' => ListAiSectionContents::route('/'),
            'create' => CreateAiSectionContent::route('/create'),
            'edit' => EditAiSectionContent::route('/{record}/edit'),
        ];
    }
}