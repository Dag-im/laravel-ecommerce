<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 lg:flex lg:space-x-8">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-48 w-48 object-cover rounded-lg">
                    </div>
                    <div class="mt-4 lg:mt-0 lg:ml-6">
                        <h3 class="text-2xl font-semibold text-indigo-400">{{ $product->name }}</h3>
                        <p class="mt-2 text-gray-400">{{ $product->description }}</p>
                        <p class="mt-4 text-xl font-semibold text-indigo-600">${{ number_format($product->price, 2) }}</p>
                        
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
