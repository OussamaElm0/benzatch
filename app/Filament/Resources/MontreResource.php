<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MontreResource\Pages;
use App\Filament\Resources\MontreResource\RelationManagers;
use App\Models\Marque;
use App\Models\Montre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MontreResource extends Resource
{
    protected static ?string $model = Montre::class;

    protected static ?string $navigationIcon = 'feathericon-watch';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("serial_number")
                    ->label("Serial Number")
                    ->required(),
                Forms\Components\Select::make("marque_id")
                    ->label("Marque")
                    ->options(Marque::all()->pluck("brand","id"))
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make("color")
                    ->label("Color")
                    ->required(),
                Forms\Components\TextInput::make("quantite")
                    ->label("Quantité")
                    ->numeric()
                    ->minValue(0)
                    ->step(1)
                    ->required(),
                Forms\Components\TextInput::make("prix")
                    ->label("Prix")
                    ->numeric()
                    ->minValue(0)
                    ->step(1)
                    ->required(),
                Forms\Components\Textarea::make("description")
                    ->label("Description")
                    ->required(),
                Forms\Components\TextInput::make("reduction")
                    ->label("Reduction")
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMontres::route('/'),
            'create' => Pages\CreateMontre::route('/create'),
            'edit' => Pages\EditMontre::route('/{record}/edit'),
        ];
    }
}
