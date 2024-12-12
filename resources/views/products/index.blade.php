@extends('welcome')

@section('content')
<div class="overflow-x-auto">
    <div class='flex flex-col'>
        @include('partials.search')
    </div>
    <table class="min-w-full table-auto border-collapse">
        <thead>
            <tr class="bg-blue-600 text-white text-left">
                <th class="py-3 px-6">Product Image</th>
                <th class="py-3 px-6">Title</th>
                <th class="py-3 px-6">Description</th>
                <th class="py-3 px-6">Quantity Available</th>
                <th class="py-3 px-6">Price</th>
                <th class="py-3 px-6">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                            class="w-20 h-20 object-cover mx-auto">
                    </td>
                    <td class="py-3 px-6">{{ $product->title }}</td>
                    <td class="py-3 px-6 text-gray-600">{{ $product->description }}</td>
                    <td class="py-3 px-6 text-center">{{ $product->quantity }}</td>
                    <td class="py-3 px-6 text-center">
                        ${{ number_format($product->price, 2) }}
                    </td>
                    <td class="py-3 px-6 text-center space-x-2">

                        <a href="{{ route('products.show', $product->id) }}"
                            class="inline-block px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 transition">
                            Show
                        </a>

                        <a href="{{ route('products.edit', $product->id) }}"
                            class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block"
                            onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-block px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-8 flex justify-center">
    {{ $products->links() }}
</div>
@endsection