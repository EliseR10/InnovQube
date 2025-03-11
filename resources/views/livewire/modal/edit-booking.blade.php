<div>
    @if ($show)
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg">
            <h3 class="text-lg font-semibold mb-5">Edit Reservation</h3>

            <!-- Display Success Message -->
            @if (session()->has('message'))
                <div class="p-5 mt-5 min-w-[600px] bg-green-500 text-white shadow rounded-lg flex flex-col items-center">
                    {{ session('message') }}
                </div>
            @endif

            <div class="mt-4">
                <!-- Form content for editing -->
                <div>
                    <p><strong>Property Name:</strong> {{ $propertyName }}</p>
                    <!-- Start Date -->
                    <label for="start-date" class="mr-2"><strong>Start date:</strong> </label>
                    <input type="date" wire:model="FormattedStartDate" id="start-date" wire:change="calculateTotalPrice">

                    <!-- End Date -->
                    <label for="end-date" class="ml-5 mr-2"><strong>End date:</strong> </label>
                    <input type="date" wire:model="FormattedEndDate" id="end-date" wire:change="calculateTotalPrice">
                </div>

                <div class="my-5">
                    <p><strong>Price per night:</strong> £ {{ $price }}</p>
                    <h4><strong>Total Price:</strong> £ {{ $totalPrice }}</h4>
                </div>

                <button type="button" wire:click="saveChanges" class="bg-pink-700 text-white px-3 py-1 rounded hover:bg-pink-500">
                    Save Changes
                </button>
                <button type="button" wire:click="closeModal" class="bg-black text-white px-3 py-1 rounded hover:bg-pink-500">
                    Close
                </button>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Livewire.on('reloadPage', () => {
                    setTimeout(() => {
                        window.location.reload();
                    }, 3000);   
                });
            });
        </script>

    </div>
    @endif
</div>