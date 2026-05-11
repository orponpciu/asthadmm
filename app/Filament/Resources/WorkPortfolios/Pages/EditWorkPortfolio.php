<?php

namespace App\Filament\Resources\WorkPortfolios\Pages;

use App\Filament\Resources\WorkPortfolios\WorkPortfolioResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWorkPortfolio extends EditRecord
{
    protected static string $resource = WorkPortfolioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
