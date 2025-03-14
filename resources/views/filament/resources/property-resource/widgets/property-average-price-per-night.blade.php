<x-filament-widgets::widget>
    <x-filament::section>
        <!-- Display the properties average price per night-->
        <div>
            <h2 class="text-lg font-semibold text-gray-800">Average Price Per Night:</h2>

            <p class="text-xl text-blue-600">£ {{ number_format($propertyAveragePrice, 2) }}</p>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
