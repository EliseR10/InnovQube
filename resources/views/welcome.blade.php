@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($properties as $property)
            <x-card 
                :name="$property->name" 
                :image="$property->image_url" 
                :description="$property->description" 
                :price="number_format($property->price_per_night, 2)" 
            />
        @endforeach
    </div>
@endsection
