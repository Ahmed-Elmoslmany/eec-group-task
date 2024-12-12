@extends('welcome')

@section('content')
<div class="overflow-x-auto">
    <a href="{{ route('pharmacy.create')}}"
        class="inline-block px-4 py-2 mb-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
        Create
    </a>
    <table class="min-w-full table-auto border-collapse">
        <thead>
            <tr class="bg-blue-600 text-white text-left">
                <th class="py-3 px-6">Name</th>
                <th class="py-3 px-6">Address</th>
                <th class="py-3 px-6">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pharmacies as $pharmacy)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $pharmacy->name }}</td>
                    <td class="py-3 px-6 text-gray-600">{{ $pharmacy->address }}</td>
                    <td class="py-3 px-6 text-center space-x-2">

                        <a href="{{ route('pharmacy.show', $pharmacy->id) }}"
                            class="inline-block px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 transition">
                            Show
                        </a>

                        <a href="{{ route('pharmacy.edit', $pharmacy->id) }}"
                            class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                            Edit
                        </a>

                        <form action="{{ route('pharmacy.destroy', $pharmacy->id) }}" method="POST" class="inline-block"
                            onsubmit="return confirm('Are you sure you want to delete this pharmacy?');">
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
    {{ $pharmacies->links() }}
</div>
@endsection