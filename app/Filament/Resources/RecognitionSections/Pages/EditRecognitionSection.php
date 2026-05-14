<?php

namespace App\Filament\Resources\RecognitionSections\Pages;

use App\Filament\Resources\RecognitionSections\RecognitionSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRecognitionSection extends EditRecord
{
    protected static string $resource = RecognitionSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
