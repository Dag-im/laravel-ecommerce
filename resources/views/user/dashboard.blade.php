<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <button id="toggleCartButton" class="bg-white text-indigo-600 px-4 py-2 rounded-md flex items-center space-x-2">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="h-5 w-5">
        <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
    </svg>
</button>

        </div>
            <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="cartContainer" class="hidden mt-4">
                <div class="bg-white dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Your Cart</h3>
                    @if ($cartItems && $cartItems->count() > 0)
                        <div class="overflow-y-auto max-h-48 rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 rounded-lg">
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Quantity
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>                                    
                                    @foreach ($cartItems as $cartItem)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $cartItem->product->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">${{ number_format($cartItem->product->price, 2) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $cartItem->quantity }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <form action="{{ route('cart.remove', ['cartItem' => $cartItem->id]) }}" method="POST" class="removeFromCartForm">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Remove</button>
                                                </form> 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-600">Your cart is empty.</p>
                    @endif
                </div>
            </div>
            <!-- Featured Banners -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-10">
                @foreach ($banners as $banner)
                    <div class="bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden shadow-md">
                        <div class="relative h-40">
                            <img src="https://t3.ftcdn.net/jpg/00/90/81/26/360_F_90812657_zMysvfNxnp5ibZH9Dc77PzkBhwoPl3Kb.jpg" alt="{{ $banner->title }}" class="absolute inset-0 w-full h-full object-cover z-0">
                            <div class="absolute inset-0 bg-black opacity-30 z-10"></div> <!-- Dark overlay -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center z-20">
                                <div class="text-center text-white">
                                    <h3 class="text-lg font-semibold">{{ $banner->title }}</h3>
                                    <p class="text-sm text-gray-300">{{ $banner->description }}</p>
                                </div>
                                <a href="#" class="mt-5 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors duration-300">Shop Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 my-10">
                <!-- Product Listings -->
                @foreach ($products as $product)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                        <div class="p-4">
                            <div class="flex justify-center mb-4">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-70 w-full object-cover rounded-lg">
                            </div>
                            <h3 class="text-lg font-medium text-indigo-600">{{ $product->name }}</h3>
                            <p class="mt-2 text-xl font-semibold text-indigo-600">${{ number_format($product->price, 2) }}</p>
                            <div class="mt-4 flex justify-between items-center">
                                <a href="{{ route('products.show', $product->id) }}" class="text-indigo-600 hover:text-indigo-900">View Details</a>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" id="addToCartForm{{ $product->id }}">
                                    @csrf
                                    <button type="submit" class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </x-slot>


    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleCartButton = document.getElementById('toggleCartButton');
        const cartContainer = document.getElementById('cartContainer');

        toggleCartButton.addEventListener('click', function () {
            // Toggle visibility of cartContainer
            cartContainer.classList.toggle('hidden');
        });
    });
</script>
</x-app-layout>
