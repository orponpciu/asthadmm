<?php

namespace App\Filament\Resources\AuditContacts\Pages;

use App\Filament\Resources\AuditContacts\AuditContactResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAuditContact extends CreateRecord
{
    protected static string $resource = AuditContactResource::class;
}
