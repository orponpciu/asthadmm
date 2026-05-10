<?php

namespace App\Filament\Resources\AuditContacts\Pages;

use App\Filament\Resources\AuditContacts\AuditContactResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAuditContacts extends ListRecords
{
    protected static string $resource = AuditContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
