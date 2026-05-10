<?php

namespace App\Filament\Resources\AuditContacts\Pages;

use App\Filament\Resources\AuditContacts\AuditContactResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAuditContact extends ViewRecord
{
    protected static string $resource = AuditContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
