<?php

namespace App\Filament\Resources\WorkPortfolios\Pages;

use App\Filament\Resources\WorkPortfolios\WorkPortfolioResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWorkPortfolios extends ListRecords
{
    protected static string $resource = WorkPortfolioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
