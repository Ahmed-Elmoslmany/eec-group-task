@extends('welcome')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-6">Product Info</h1>
    <div class="mb-4">
        <label for="title" class="block text-lg font-medium text-gray-700">Product Title</label>
        <p
            class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            {{$product->title}}
        </p>
    </div>

    <div class="mb-4">
        <label for="description" class="block text-lg font-medium text-gray-700">Product Description</label>
        <p
            class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            {{ $product->description }}
        </p>
    </div>

    <div class="mb-4">
        <label for="price" class="block text-lg font-medium text-gray-700">Price</label>
        <p
            class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            {{$product->price}}$
        </p>
    </div>

    <div class="mb-4">
        <label for="quantity" class="block text-lg font-medium text-gray-700">Quantity Available</label>
        <p
            class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            {{$product->quantity}}
        </p>
    </div>

    <div class="mb-4">
        @if($product->image)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $product->image) }}" alt="Current Product Image"
                    class="w-20 h-20 object-cover">
                <p class="text-sm text-gray-600 mt-2">Current Image</p>
            </div>
        @endif
    </div>
    </form>
@include('partials.pharmacies')
</div>
@endsection