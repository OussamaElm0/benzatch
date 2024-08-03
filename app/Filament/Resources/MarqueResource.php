<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MarqueResource\Pages;
use App\Filament\Resources\MarqueResource\RelationManagers\MontresRelationManager;
use App\Models\Marque;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ColorEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MarqueResource extends Resource
{
    protected static ?string $model = Marque::class;

    protected static ?string $navigationIcon = 'tabler-category';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("brand")
                    ->label("Brand")
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("brand")
                    ->searchable()
                    ->label("Brand"),
                Tables\Columns\TextColumn::make("montres_count")
                    ->label("Nombre des montres")
                    ->counts("montres")
            ])
            ->filters([
                //
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
                TextEntry::make('brand'),
                TextEntry::make('montres_count'),
                RepeatableEntry::make('montres')
                    ->schema([
                        TextEntry::make('serial_number')
                            ->color(Color::Green)
                            ->size(TextEntry\TextEntrySize::Medium),
                        TextEntry::make('quantite')
                            ->color(Color::Green)
                            ->size(TextEntry\TextEntrySize::Medium),
                        ColorEntry::make('color'),
                    ])
                    ->grid(2),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            MontresRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMarques::route('/'),
            'create' => Pages\CreateMarque::route('/create'),
            'edit' => Pages\EditMarque::route('/{record}/edit'),
        ];
    }
}
