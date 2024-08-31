<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Filament\Resources\MessageResource\RelationManagers;
use App\Models\Message;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?int $navigationSort = 3;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('vu','false')->count();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('prenom')
                    ->label('Prenom')
                    ->searchable(),
                TextColumn::make('nom')
                    ->label('Nom')
                    ->searchable(),
                TextColumn::make('tel')
                    ->label('Tel'),
                TextColumn::make('message')
                    ->label('Message')
                    ->limit(20),
                ToggleColumn::make('vu')
                    ->label('Vu'),
                TextColumn::make('created_at')
                    ->label('Date'),
            ])
            ->defaultSort('created_at','desc')
            ->filters([
                TernaryFilter::make('vu')
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->color(Color::Green),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('markAsRead')
                        ->label('Marquer comme lu')
                        ->icon('heroicon-o-eye')
                        ->color(Color::Blue)
                        ->action(function (Collection $records) {
                            foreach ($records as $record) {
                                $record->update(['vu' => true]);
                            }
                        })
                        ->requiresConfirmation(),
                    Tables\Actions\BulkAction::make('markAsNotRead')
                        ->label('Marquer comme non lu')
                        ->icon('heroicon-o-eye')
                        ->action(function (Collection $records) {
                            foreach ($records as $record) {
                                $record->update(['vu' => false]);
                            }
                        })
                        ->requiresConfirmation(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('prenom')
                    ->label('Prenom')
                    ->extraAttributes(['class' => 'font-bold']),
                TextEntry::make('nom')
                    ->label('Nom')
                    ->extraAttributes(['class' => 'font-bold']),
                TextEntry::make('tel')
                    ->label('Telephone')
                    ->extraAttributes(['class' => 'font-bold']),
                TextEntry::make('created_at')
                    ->label('Date')
                    ->extraAttributes(['class' => 'font-bold']),
                IconEntry::make('vu')
                    ->boolean()
                    ->size(IconEntry\IconEntrySize::ExtraLarge)
                    ->label("Marquer comme vu"),
                TextEntry::make('message')
                    ->color(Color::Green)
                    ->columnSpanFull()
                    ->extraAttributes(['class' => 'font-extrabold']),
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
            'index' => Pages\ListMessages::route('/'),
        ];
    }
}
