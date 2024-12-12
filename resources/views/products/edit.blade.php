@extends('welcome')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-6">Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-lg font-medium text-gray-700">Product Title</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                value="{{ old('title', $product->title) }}" 
                required
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            @error('title')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-lg font-medium text-gray-700">Product Description</label>
            <textarea 
                name="description" 
                id="description" 
                rows="4" 
                required 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >{{ old('description', $product->description) }}</textarea>
            @error('description')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="block text-lg font-medium text-gray-700">Price ($)</label>
            <input 
                type="number" 
                name="price" 
                id="price" 
                value="{{ old('price', $product->price) }}" 
                required 
                step="0.01" 
                min="0" 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            @error('price')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-lg font-medium text-gray-700">Quantity Available</label>
            <input 
                type="number" 
                name="quantity" 
                id="quantity" 
                value="{{ old('quantity', $product->quantity) }}" 
                required 
                min="0" 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            @error('quantity')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-lg font-medium text-gray-700">Product Image</label>
            <input 
                type="file" 
                name="image" 
                id="image" 
                accept="image/*" 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            @if($product->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Current Product Image" class="w-20 h-20 object-cover">
                    <p class="text-sm text-gray-600 mt-2">Current Image</p>
                </div>
            @endif
            @error('image')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button 
                type="submit" 
                class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors"
            >
                Update Product
            </button>
        </div>
    </form>
</div>
@endsection
