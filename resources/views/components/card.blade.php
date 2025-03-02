<div class="card max-w-xs rounded-lg shadow-lg overflow-hidden bg-white">
    <img src="{{ asset('storage/luxury apartment.jpg') }}" alt="{{ $name }}" class="w-full h-56 object-cover">
    
    <div class="p-4">
        <h2 class="text-xl font-semibold text-gray-800">{{ $name }}</h2>
        <p class="text-gray-600 text-justify">{{ $description }}</p>
        <p class="text-md font-bold text-black-500">£{{ $price }} / night</p>

        <div class="flex justify-end mt-4">
            <button class="mt-4 bg-pink-700 text-white px-4 py-2 rounded hover:bg-pink-500">
                Book Now
            </button>
        </div>
        
    </div>
</div>


