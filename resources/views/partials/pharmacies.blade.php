<h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-4">Pharmacies that have this product</h2>
<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="py-3 px-4 text-left text-gray-600">Pharmacy Name</th>
                <th class="py-3 px-4 text-left text-gray-600">Address</th>
                <th class="py-3 px-4 text-left text-gray-600">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pharmacies as $pharmacy)
                <tr class="border-b">
                    <td class="py-3 px-4 text-gray-700">
                        <a href="{{ route('pharmacy.show', $pharmacy->id) }}" class="text-blue-600 hover:text-blue-800">
                            {{$pharmacy->name}}
                        </a>
                    </td>
                    <td class="py-3 px-4 text-gray-700">{{$pharmacy->address}}</td>
                    <td class="py-3 px-4 text-gray-700">${{ $pharmacy->pivot->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>