<x-filament-widgets::widget>
    <x-filament::section>
        <!-- Add an icon here, using Heroicons -->
        <i class="fas fa-address-book w-12 h-12 text-blue-500"></i>

        <!-- Display the property count -->
        <div>
            <h2 class="text-lg font-semibold text-gray-800">
                Total Properties Available: 
            </h2>
            <p class="text-xl text-blue-600">{{ $propertyCount }}</p>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
