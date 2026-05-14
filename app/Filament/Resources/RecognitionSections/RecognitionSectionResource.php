<?php

namespace App\Filament\Resources\RecognitionSections;

use App\Filament\Resources\RecognitionSections\Pages\CreateRecognitionSection;
use App\Filament\Resources\RecognitionSections\Pages\EditRecognitionSection;
use App\Filament\Resources\RecognitionSections\Pages\ListRecognitionSections;
use App\Filament\Resources\RecognitionSections\Schemas\RecognitionSectionForm;
use App\Filament\Resources\RecognitionSections\Tables\RecognitionSectionsTable;
use App\Models\RecognitionSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RecognitionSectionResource extends Resource
{
    protected static ?string $model = RecognitionSection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Recognition Section';

    public static function form(Schema $schema): Schema
    {
        return RecognitionSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RecognitionSectionsTable::configure($table);
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
            'index' => ListRecognitionSections::route('/'),
            'create' => CreateRecognitionSection::route('/create'),
            'edit' => EditRecognitionSection::route('/{record}/edit'),
        ];
    }
}
