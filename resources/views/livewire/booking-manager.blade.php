<div>
    <!-- Display Success Message -->
    @if (session()->has('message'))
        <div class="p-5 mt-5 min-w-[600px] bg-green-500 text-white shadow rounded-lg flex flex-col items-center">
            {{ session('message') }}
        </div>
    @endif

    <div class="p-8 mt-5 min-w-[600px] bg-white shadow rounded-lg flex flex-col items-center">
        <h2 class="text-xl font-semibold text-gray-800 flex mb-4">Reserve: {{$name}}</h2>

        <div class="booking-form space-y-4 w-full max-w-[600px]">
            <div>
                <!--Start Date-->
                <label for="start-date" class="mr-2"><strong>Start date:</strong></label>
                <input type="date" wire:model="startDate" id="start-date" wire:change="calculateTotalPrice">
            
                <!--End Date-->
                <label for="end-date" class="ml-5 mr-2"><strong>End date:</strong></label>
                <input type="date" wire:model="endDate" id="end-date" wire:change="calculateTotalPrice">
            </div>

            <div>
                <p><strong>Price per night:</strong> £ {{ $price }}</p>
                <p><strong>Total Price:</strong> £ {{ $total_price }} </p>
            </div>

            <div class="flex flex-col items-center">
                <button type="button" wire:click="submitBooking" class="mt-4 bg-pink-700 text-white px-4 py-2 rounded hover:bg-pink-500">Confirm Booking</button>
            </div>
        </div>
    </div>

    <div class="p-8 mt-5 min-w-[600px] bg-white shadow rounded-lg flex flex-col items-center">
        <h2 class="text-xl font-semibold text-gray-800">Your Reservations</h2>

        @foreach($bookings as $booking)
        <div class="booking-info space-y-4 w-full max-w-[600px] mt-5">
            <div class="flex justify-between w-full">
                <!-- Property Name -->
                <h3 class="text-lg font-semibold">Property Name: {{ $booking -> property -> name }}</h3>

                <!-- Buttons -->
                <div class="flex space-x-2">
                    <div>
                    <button type="button" wire:click="$dispatch('open-modal')" class="bg-pink-700 text-white px-3 py-1 rounded hover:bg-pink-500">
                        <i class="fas fa-pen"></i>
                    </button>
                    </div>

                    <button type="button" wire:click="deleteBooking" class="bg-pink-700 text-white px-3 py-1 rounded hover:bg-pink-500">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>

            <!-- Other Details -->
            <div class="space-y-2">
                <h4><strong>Booking Date:</strong> {{ $booking-> formatted_start_date }} to {{ $booking-> formatted_end_date }}</h4>
                <h4><strong>Price per night:</strong> £ {{ $booking-> price_per_night }}</h4>
                <h4><strong>Total Price:</strong> £ {{ $booking-> total_price }}</h4>
            </div>
        </div>
    @endforeach
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