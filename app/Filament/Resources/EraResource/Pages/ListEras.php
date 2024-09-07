<?php

namespace App\Filament\Resources\EraResource\Pages;

use App\Filament\Resources\EraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEras extends ListRecords
{
    protected static string $resource = EraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
