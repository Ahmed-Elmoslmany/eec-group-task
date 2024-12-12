@extends('welcome')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-6">Pharmacy Info</h1>
    <div class="mb-4">
        <label for="name" class="block text-lg font-medium text-gray-700">Pharmacy Name</label>
        <p
            class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            {{$pharmacy->name}}
        </p>
    </div>

    <div class="mb-4">
        <label for="address" class="block text-lg font-medium text-gray-700">Pharmacy Address</label>
        <p
            class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            {{ $pharmacy->address }}
        </p>
    </div>
</div>
@endsection