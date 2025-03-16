<x-filament-widgets::widget>
    <x-filament::section>
        <!-- Display the booking count -->
        <div>
            <h2 class="text-lg font-semibold text-gray-800">
                Total Bookings: 
            </h2>
            <p class="text-xl text-blue-600">{{ $bookingCount }}</p>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
