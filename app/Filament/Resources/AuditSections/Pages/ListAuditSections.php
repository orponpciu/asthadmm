<?php

namespace App\Filament\Resources\AuditSections\Pages;

use App\Filament\Resources\AuditSections\AuditSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAuditSections extends ListRecords
{
    protected static string $resource = AuditSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
