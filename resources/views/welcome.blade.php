@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        <x-card name="Property 1" image="{{ asset('storage/luxury apartment.jpg') }}" description="A beautiful house by the sea." price="£150"/>
        <x-card image="{{ asset('storage/luxury apartment.jpg') }}" name="Property 2" description="Luxury apartment in the city center." price="£300"/>
        <x-card image="{{ asset('storage/luxury apartment.jpg') }}" name="Property 3" description="Cozy cabin in the mountains." price="£200"/>
    </div>
@endsection
