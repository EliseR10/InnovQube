<div>
    <div class="p-8 mt-5 min-w-[600px] bg-white shadow rounded-lg flex flex-col items-center">
        <h2 class="text-xl font-semibold text-gray-800 flex mb-4">Reserve: {{$name}}</h2>

        <div class="booking-form space-y-4 w-full max-w-[600px]">
            <div>
                <!--Start Date-->
                <label for="start-date" class="mr-2"><strong>Start date:</strong></label>
                <input type="date" wire:model="startDate" id="start-date">
            
                <!--End Date-->
                <label for="end-date" class="ml-5 mr-2"><strong>End date:</strong></label>
                <input type="date" wire:model="endDate" id="end-date">
            </div>

            <div>
                <p><strong>Total Price:</strong> £ {{ $price }}</p>
            </div>

            <div class="flex flex-col items-center">
                <button type="button" wire:click="submitBooking" class="mt-4 bg-pink-700 text-white px-4 py-2 rounded hover:bg-pink-500">Confirm Booking</button>
            </div>
        </div>
    </div>

    <div class="p-8 mt-5 min-w-[600px] bg-white shadow rounded-lg flex flex-col items-center">
        <h2 class="text-xl font-semibold text-gray-800">Your reservations</h2>

        <div class="booking-info space-y-4 w-full max-w-[600px]">
            <div class="flex justify-between w-full">
                <!-- Property Name -->
                <h3 class="text-lg font-semibold">Property Name:</h3>

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
                <h4>Date: </h4>
                <h4>Price: </h4>
            </div>
        </div>

    </div>
</div>