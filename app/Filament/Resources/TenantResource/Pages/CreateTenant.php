<?php

namespace App\Filament\Resources\TenantResource\Pages;

use App\Filament\Resources\TenantResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTenant extends CreateRecord
{
    protected static string $resource = TenantResource::class;

    protected function afterCreate()
    {
        $tenant = $this->getRecord();

        $tenant->domains()->create([
            'domain' => $this->data['domain'],
        ]);
    }
}
