<div>
@if ($show)
<div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg">
            <h3 class="text-lg font-semibold mb-5">Edit Reservation</h3>

            <div class="mt-4">
                <!-- Form content for editing -->
                <div>
                    <p><strong>Property Name:</strong></p>
                    <!-- Start Date -->
                    <label for="start-date" class="mr-2"><strong>Start date:</strong></label>
                    <input type="date" wire:model="startDate" id="start-date">

                    <!-- End Date -->
                    <label for="end-date" class="ml-5 mr-2"><strong>End date:</strong></label>
                    <input type="date" wire:model="endDate" id="end-date">
                </div>

                <div class="my-5">
                    <p><strong>Total Price:</strong> £0.00</p>
                </div>

                <button type="submit" wire:click="saveChanges" class="bg-pink-700 text-white px-3 py-1 rounded hover:bg-pink-500">
                    Save Changes
                </button>
                <button type="button" wire:click="closeModal" class="bg-black text-white px-3 py-1 rounded hover:bg-pink-500">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>
@endif
</div>