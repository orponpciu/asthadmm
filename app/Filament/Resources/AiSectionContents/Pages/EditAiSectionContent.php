<?php

namespace App\Filament\Resources\AiSectionContents\Pages;

use App\Filament\Resources\AiSectionContents\AiSectionContentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAiSectionContent extends EditRecord
{
    protected static string $resource = AiSectionContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
