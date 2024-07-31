<?php

namespace App\Filament\Resources\MontreResource\Pages;

use App\Filament\Resources\MontreResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMontres extends ListRecords
{
    protected static string $resource = MontreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
