<div class="bg-gray-100 flex flex-col items-center py-8 mb-8">
    <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-md">
        <form id="searchForm" action="{{ route('products.search') }}" method="GET" class="flex space-x-2">
            <input type="text" name="query" id="searchInput" placeholder="Search for a product..." autofocus
                value="{{ old('query', $query ?? '') }}"
                class="w-full border-gray-300 rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-300 px-4 py-2">

            <a href="{{ route('products.create') }}"
                class="inline-block px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 transition">
                Create
            </a>
        </form>
    </div>
</div>