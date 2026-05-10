<?php

namespace App\Filament\Resources\AuditContacts\Pages;

use App\Filament\Resources\AuditContacts\AuditContactResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAuditContact extends EditRecord
{
    protected static string $resource = AuditContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
