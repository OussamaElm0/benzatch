<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommandeResource\Pages;
use App\Models\Commande;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommandeResource extends Resource
{
    protected static ?string $model = Commande::class;

    protected static ?string $navigationIcon = 'polaris-order-filled-icon';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('client_name')
                    ->label('Client'),
                TextColumn::make('client_contact')
                    ->label('Contact'),
                TextColumn::make('items')
                    ->label('Montres')
                    ->getStateUsing(function (Commande $record) {
                        return $record->total_quantity;
                    }),
                TextColumn::make('total')
                    ->money("MAD"),
                IconColumn::make('confirmed')
                    ->boolean(),
            ])
            ->defaultSort('created_at','desc')
            ->filters([
                Tables\Filters\Filter::make('not_confirmed')
                    ->label('Commandes non confirmées')
                    ->query(fn(Builder $query) : Builder => $query->where('confirmed',false)),
                Tables\Filters\Filter::make('confirmed')
                    ->label("Commande confirmées")
                    ->query(fn(Builder $query) : Builder => $query->where('confirmed',true))
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
            'index' => Pages\ListCommandes::route('/'),
            'create' => Pages\CreateCommande::route('/create'),
            'edit' => Pages\EditCommande::route('/{record}/edit'),
        ];
    }
}
