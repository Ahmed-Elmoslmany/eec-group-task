@extends('welcome')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-6">Edit Pharmacy</h1>

    <form action="{{ route('pharmacy.update', $pharmacy->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-lg font-medium text-gray-700">Pharmacy Name</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                value="{{ old('name', $pharmacy->name) }}" 
                required
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            @error('name')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="address" class="block text-lg font-medium text-gray-700">Pharmacy Address</label>
            <textarea 
                name="address" 
                id="address" 
                rows="4" 
                required 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >{{ old('address', $pharmacy->address) }}</textarea>
            @error('address')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end">
            <button 
                type="submit" 
                class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors"
            >
                Update Pharmacy
            </button>
        </div>
    </form>
</div>
@endsection
