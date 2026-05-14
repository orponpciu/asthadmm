<?php

namespace App\Filament\Resources\RecognitionSections\Pages;

use App\Filament\Resources\RecognitionSections\RecognitionSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRecognitionSections extends ListRecords
{
    protected static string $resource = RecognitionSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
