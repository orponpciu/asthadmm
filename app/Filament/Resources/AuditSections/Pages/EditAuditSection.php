<?php

namespace App\Filament\Resources\AuditSections\Pages;

use App\Filament\Resources\AuditSections\AuditSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAuditSection extends EditRecord
{
    protected static string $resource = AuditSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
