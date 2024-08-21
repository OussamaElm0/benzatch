<tr class="bg-white border-b">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <a href="{{ route('montres.show',$montre['id']) }}" class="hover:underline">
            {{ $montre['serial_number'] }}
        </a>
    </th>
    <td>
        <img
            src="{{ asset("storage/" . $montre['image']) }}"
            class="w-16 h-16 self-center rounded m-2"
            alt="{{ $montre['serial_number'] }}"
        />
    </td>
    <td class="px-6 py-4 mobile:flex mobile:flex-row gap-2">
        <button wire:click="decrement" class="text-xl">-</button>
        <span>{{ $montre['quantity'] }}</span>
        <button wire:click="increment" class="text-xl">+</button>
    </td>
    <td class="px-6 py-4">
        {{ $montre['price'] }}
    </td>
    <td>
        <button wire:click="delete" class="w-8 mobile:w-6">
            <x-fluentui-delete-48-o />
        </button>
    </td>
</tr>
