<?php

namespace App\Filament\Widgets;

use App\Models\Commande;
use App\Models\Montre;
use Filament\Widgets\ChartWidget;

class MontresChart extends ChartWidget
{
    protected static ?string $heading = 'Les montres les plus vendues';

    protected int | string | array $columnSpan = 2;

    protected static ?int $sort = 1;

    protected function getData(): array
    {
        // Initialize an empty array to store the count of each montre
        $montreCounts = [];

        // Fetch all commandes
        $commandes = Commande::all();

        // Loop through each commande to extract and count the montres
        foreach ($commandes as $commande) {
            $items = json_decode($commande->items, true);

            foreach ($items as $item) {
                $montreId = $item['id'];
                $quantity = $item['quantity'] ?? 1;

                // Increment the count for this montre
                if (isset($montreCounts[$montreId])) {
                    $montreCounts[$montreId] += $quantity;
                } else {
                    $montreCounts[$montreId] = $quantity;
                }
            }
        }

        // Sort montres by count in descending order
        arsort($montreCounts);

        // Prepare data for the chart
        $labels = [];
        $data = [];
        $colors = [];

        // Define a large array of color codes
        $colorPalette = [
            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40',
            '#F7464A', '#46BFBD', '#FDB45C', '#949FB1', '#4D5360', '#AC64AD',
            '#D4E157', '#FF7043', '#AB47BC', '#26A69A', '#7E57C2', '#FFCA28',
            '#42A5F5', '#66BB6A', '#8D6E63', '#78909C', '#8E24AA', '#D32F2F',
        ];

        foreach ($montreCounts as $montreId => $count) {
            $montre = Montre::find($montreId);
            $labels[] = $montre ? $montre->brand . ' ' . $montre->serial_number : "Unknown Montre (ID: $montreId)";
            $data[] = $count;
            $colors[] = $colorPalette[array_key_exists(count($colors), $colorPalette) ? count($colors) : 0];
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Montres Sold',
                    'data' => $data,
                    'backgroundColor' => $colors,
                ],
            ],
            'options' => [
                'scales' => [
                    'x' => [
                        'beginAtZero' => true,
                        'ticks' => [
                            'display' => true,
                        ],
                    ],
                    'y' => [
                        'beginAtZero' => true,
                        'ticks' => [
                            'display' => true,
                        ],
                    ],
                ]
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
