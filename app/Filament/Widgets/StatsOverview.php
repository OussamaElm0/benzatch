<?php

namespace App\Filament\Widgets;

use App\Models\Commande;
use App\Models\Message;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;

class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;

        $commandes = Commande::query()
            ->when($startDate,fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
            ->count();

        $messages = Message::query()
            ->when($startDate,fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
            ->count();

        $confirmedCommandes = Commande::query()
            ->where('status','confirmed')
            ->when($startDate,fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
            ->count();

        $canceledCommandes = Commande::query()
            ->where('status','canceled')
            ->when($startDate,fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
            ->count();

        // Determine descriptionIcon and color dynamically
        $commandeDescriptionIcon = $commandes > 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';
        $commandeColor = $commandes > 0 ? 'success' : 'danger';

        $confirmedDescriptionIcon = $confirmedCommandes > 0 ? 'heroicon-m-check-circle' : 'heroicon-m-x-circle';
        $confirmedColor = $confirmedCommandes > 0 ? 'success' : 'danger';

        $canceledDescriptionIcon = $canceledCommandes > 0 ? 'heroicon-m-exclamation-circle' : 'heroicon-m-check-circle';
        $canceledColor = $canceledCommandes > 0 ? 'danger' : 'success';

        $messagesDescriptionIcon = $messages > 0 ? 'heroicon-m-chat-bubble-left' : 'heroicon-m-chat-bubble-left-ellipsis';
        $messagesColor = $messages > 0 ? 'info' : 'secondary';

        return [
            Stat::make('Commandes', $commandes)
                ->description($commandes > 0 ? 'Nouvelles commandes' : 'Aucune nouvelle commande')
                ->descriptionIcon($commandeDescriptionIcon)
                ->color($commandeColor),

            Stat::make('Commandes Confirmées', $confirmedCommandes)
                ->description($confirmedCommandes > 0 ? 'Commandes confirmées' : 'Aucune commande confirmée')
                ->descriptionIcon($confirmedDescriptionIcon)
                ->color($confirmedColor),

            Stat::make('Commandes Annulée', $canceledCommandes)
                ->description($canceledCommandes > 0 ? 'Commandes annulées' : 'Aucune commande annulée')
                ->descriptionIcon($canceledDescriptionIcon)
                ->color($canceledColor),

            Stat::make('Messages', $messages)
                ->description($messages > 0 ? 'Nouveaux messages' : 'Aucun nouveau message')
                ->descriptionIcon($messagesDescriptionIcon)
                ->color($messagesColor),
        ];
    }
}
