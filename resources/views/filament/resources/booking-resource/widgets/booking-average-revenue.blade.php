<x-filament-widgets::widget>
    <x-filament::section>
        <!-- Display the bookings average revenue-->
        <div>
            <h2 class="text-lg font-semibold text-gray-800">Average Booking Revenue:</h2>

            <p class="text-xl text-blue-600">£ {{ number_format($bookingAveragePrice, 2) }}</p>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
