<?php

//TODO:
//The serial number must be not existed
namespace App\Filament\Resources;

use App\Filament\Resources\MontreResource\Pages;
use App\Filament\Resources\MontreResource\RelationManagers\MarqueRelationManager;
use App\Models\Marque;
use App\Models\Montre;
use App\Models\Image;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ColorEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\Colors\Color;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Cache;

class MontreResource extends Resource
{
    protected static ?string $model = Montre::class;

    protected static ?string $navigationIcon = 'feathericon-watch';

    protected static ?int $navigationSort = 0;

    public static function query(): Builder
    {
        return parent::query()->with('marque'); // Eager load the marque relationship
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('serial_number')
                    ->label('Serial Number')
                    ->required(),
                Forms\Components\Select::make('marque_id')
                    ->label('Marque')
                    ->relationship("marque","brand")
                    ->options(function () {
                        return Cache::remember('marques', 60, function () {
                            return Marque::pluck('brand', 'id');
                        });
                    })
                    ->createOptionForm([
                        Forms\Components\TextInput::make("brand")
                            ->label("Brand")
                            ->required(),
                    ])
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('color')
                    ->label('Color')
                    ->required(),
                Forms\Components\Radio::make("gender")
                    ->label("Gender")
                    ->options([
                        "H" => "Male",
                        "F" => "Female"
                    ])
                    ->required(),
                Forms\Components\TextInput::make('quantite')
                    ->label('Quantité')
                    ->numeric()
                    ->minValue(0)
                    ->step(1)
                    ->required(),
                Forms\Components\TextInput::make('prix')
                    ->label('Prix')
                    ->numeric()
                    ->minValue(0)
                    ->step(1)
                    ->required(),
                Forms\Components\TextInput::make('reduction')
                    ->label('Reduction')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),
                Forms\Components\MarkdownEditor::make('description')
                    ->label('Description')
                    ->required(),
                Forms\Components\FileUpload::make('images')
                    ->disk("public")
                    ->multiple()
                    ->directory("images/montres")
                    ->panelLayout('grid')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('serial_number')
                    ->label('Serial Number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('marque.brand')
                    ->label('Marque')
                    ->searchable(),
                Tables\Columns\ColorColumn::make('color')
                    ->label('Color')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantite')
                    ->label('Quantité'),
                Tables\Columns\TextColumn::make('prix')
                    ->label('Prix')
                    ->money('MAD'),
                Tables\Columns\TextColumn::make('reduction')
                    ->label('Reduction'),
                Tables\Columns\ImageColumn::make("images"),
            ])
            ->filters([
                // Add filters here if necessary
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
                    ->color(Color::Green),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('serial_number')
                    ->label('Serial Number'),
                TextEntry::make('marque.brand')
                    ->label('Marque'),
                TextEntry::make('quantite')
                    ->label('Quantité'),
                TextEntry::make('prix')
                    ->label('Prix')
                    ->money('MAD'),
                ColorEntry::make('color'),
                TextEntry::make('description')
                    ->label('Description')
                    ->color(Color::Gray),
                ImageEntry::make("images")
                    ->disk("public"),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            MarqueRelationManager::class,
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
