<?php

namespace App\Filament\Resources\MontreResource\Pages;

use App\Filament\Resources\MontreResource;
use App\Models\Image;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CreateMontre extends CreateRecord
{
    protected static string $resource = MontreResource::class;
}
