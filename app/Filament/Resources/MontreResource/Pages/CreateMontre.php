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

    protected function handleRecordCreation(array $data): Model
    {
        $montre = static::getModel()::create($data);

        $images = $data['images'] ;

        foreach ($images as $image) {
            // Create new Image record
            Image::create([
                'montre_id' => $montre->id,
                'path' => $image,
            ]);
        }

        return $montre;
    }
}
