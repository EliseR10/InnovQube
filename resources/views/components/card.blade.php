<div class="card max-w-xs rounded-lg shadow-lg overflow-hidden bg-white flex flex-col justify-between">
    <img src="{{asset('storage/' . $image)}}" alt="{{ $name }}" class="w-full h-56 object-cover">
    
    <div class="p-4">
        <div class="min-h-[70px]">
            <h2 class="text-xl font-semibold text-gray-800">{{ $name }}</h2>
        </div>
        <p class="text-gray-600 text-justify pb-4">{{ $description }}</p>
        <p class="text-md font-bold text-black-500">£{{ $price }} / night</p>

        <div class="flex justify-end mt-4">
            <button class="mt-4 bg-pink-700 text-white px-4 py-2 rounded hover:bg-pink-500">
                Book Now!
            </button>
        </div>
        
    </div>
</div>


