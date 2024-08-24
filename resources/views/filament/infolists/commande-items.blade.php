<div>
    <div class="flex flex-wrap flex-row gap-4">
        @php
            $items = json_decode($getRecord()->items, true);
        @endphp

        @foreach ($items as $item)
            <div class="bg-white p-4 rounded shadow">
                <div class="flex items-center space-x-4 gap-4">
                    <img src="{{ asset("storage/" . $item['image']) }}" alt="{{ $item['brand'] }}" class="w-16 h-16 object-cover">
                    <div>
                        <h4 class="text-lg font-bold">{{ $item['brand'] }}</h4>
                        <p class="text-gray-600">Serial Number: {{ $item['serial_number'] }}</p>
                        <p class="text-gray-600">Price: MAD{{ $item['price'] }}</p>
                        <p class="text-gray-600">Quantity: {{ $item['quantity'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
