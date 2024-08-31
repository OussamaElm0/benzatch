<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommandeResource\Pages;
use App\Models\Commande;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Infolists\Infolist;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CommandeResource extends Resource
{
    protected static ?string $model = Commande::class;

    protected static ?string $navigationIcon = 'polaris-order-filled-icon';

    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return "En attente: " . static::getModel()::where('status','pending')->count();
    }

    public static function canCreate(): bool
    {
        return false;
    }

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
                    ->label('Client')
                    ->searchable(),
                TextColumn::make('client_contact')
                    ->label('Contact')
                    ->searchable(),
                TextColumn::make('items')
                    ->label('Montres')
                    ->getStateUsing(function (Commande $record) {
                        return $record->total_quantity;
                    }),
                TextColumn::make('total')
                    ->money("MAD"),
                SelectColumn::make('status')
                    ->options([
                        'canceled' => "Annulée",
                        'pending' => "En attente",
                        'confirmed' => "Confirmée",
                    ]),
            ])
            ->defaultSort('created_at','desc')
            ->filters([
                Tables\Filters\Filter::make('canceled')
                    ->label('Commandes non confirmées')
                    ->query(fn(Builder $query) : Builder => $query->where('status','canceled')),
                Tables\Filters\Filter::make('pending')
                    ->label('Commandes en attente')
                    ->query(fn (Builder $query) : Builder => $query->where('status','pending')),
                Tables\Filters\Filter::make('confirmed')
                    ->label("Commande confirmées")
                    ->query(fn(Builder $query) : Builder => $query->where('status','confirmed'))
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->color(Color::Green),
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
                TextEntry::make('client_name')
                    ->label('Client')
                    ->extraAttributes(['class' => 'font-bold']),
                TextEntry::make('client_contact')
                    ->label('Contact')
                    ->extraAttributes(['class' => 'font-bold']),
                TextEntry::make('created_at')
                    ->label('Date')
                    ->extraAttributes(['class' => 'font-bold']),
                TextEntry::make('total')
                    ->color(Color::Green)
                    ->extraAttributes(['class' => 'font-extrabold']),
                ViewEntry::make('items')
                    ->view('filament.infolists.commande-items')
                    ->label('Items')
                    ->columnSpan(2),
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
        ];
    }
}
