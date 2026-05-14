<?php

namespace App\Filament\Resources\AiSectionContents\Pages;

use App\Filament\Resources\AiSectionContents\AiSectionContentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAiSectionContents extends ListRecords
{
    protected static string $resource = AiSectionContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
