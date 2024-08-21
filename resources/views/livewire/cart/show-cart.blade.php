<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-black uppercase bg-gold dark:bg-gray-700 dark:text-gray-400">
    <tr>
        <th scope="col" class="px-6 py-3">Montre</th>
        <th scope="col" class="px-6 py-3">Image</th>
        <th scope="col" class="px-6 py-3">Qty</th>
        <th scope="col" class="px-6 py-3">Prix</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @forelse($cartItems as $montre)
        <livewire:cart.item :montre="$montre" :key="$montre['serial_number']" />
    @empty
        <tr class="bg-white font-semibold text-center text-l md:text-xl h-auto p-4">
            <td colspan="4">Aucune montre n'a été ajoutée au panier !</td>
        </tr>
    @endforelse
    </tbody>
    <tfoot>
    <tr class="font-semibold text-gray-900 dark:text-white">
        <th scope="row" colspan="2" class="px-6 py-3 text-base">Total</th>
        <td class="px-6 py-3">{{ $quantity }}</td>
        <td class="px-6 py-3">{{ $total }}</td>
    </tr>
    </tfoot>
</table>
