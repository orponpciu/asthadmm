<?php

namespace App\Filament\Resources\WorkPortfolios;

use App\Filament\Resources\WorkPortfolios\Pages\CreateWorkPortfolio;
use App\Filament\Resources\WorkPortfolios\Pages\EditWorkPortfolio;
use App\Filament\Resources\WorkPortfolios\Pages\ListWorkPortfolios;
use App\Filament\Resources\WorkPortfolios\Schemas\WorkPortfolioForm;
use App\Filament\Resources\WorkPortfolios\Tables\WorkPortfoliosTable;
use App\Models\WorkPortfolio;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WorkPortfolioResource extends Resource
{
    protected static ?string $model = WorkPortfolio::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Name';

    public static function form(Schema $schema): Schema
    {
        return WorkPortfolioForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WorkPortfoliosTable::configure($table);
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
            'index' => ListWorkPortfolios::route('/'),
            'create' => CreateWorkPortfolio::route('/create'),
            'edit' => EditWorkPortfolio::route('/{record}/edit'),
        ];
    }
}
