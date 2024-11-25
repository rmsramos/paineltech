<?php

namespace App\Filament\Painel\Resources\UserResource\Pages;

use App\Filament\Painel\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
