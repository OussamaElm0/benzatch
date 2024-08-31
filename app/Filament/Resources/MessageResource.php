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
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?int $navigationSort = 3;

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
                //
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
            'create' => Pages\CreateMessage::route('/create'),
        ];
    }
}
