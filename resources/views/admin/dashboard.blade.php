{{-- admin/dashboard.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __("Welcome back, :name!", ['name' => Auth::user()->name]) }}</h3>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        {{-- Products Management Section --}}
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-4">
                            <h4 class="text-gray-700 dark:text-gray-300 text-lg font-semibold mb-2">{{ __('Products Management') }}</h4>
                            <ul class="list-none p-0 m-0">
                                <li class="mb-2">
                                    <a href="{{ route('admin.products.index') }}" class="text-indigo-600 hover:text-indigo-900">{{ __('View All Products') }}</a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('admin.products.create') }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Add New Product') }}</a>
                                </li>
                                {{-- Add more links as needed --}}
                            </ul>
                        </div>

                        {{-- Users Management Section --}}
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-4">
                            <h4 class="text-gray-700 dark:text-gray-300 text-lg font-semibold mb-2">{{ __('Users Management') }}</h4>
                            <ul class="list-none p-0 m-0">
                                <li class="mb-2">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">{{ __('View All Users') }}</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">{{ __('Add New User') }}</a>
                                </li>
                                {{-- Add more links as needed --}}
                            </ul>
                        </div>

                        {{-- Orders Management Section --}}
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-4">
                            <h4 class="text-gray-700 dark:text-gray-300 text-lg font-semibold mb-2">{{ __('Orders Management') }}</h4>
                            <ul class="list-none p-0 m-0">
                                <li class="mb-2">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">{{ __('View All Orders') }}</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">{{ __('Pending Orders') }}</a>
                                </li>
                                {{-- Add more links as needed --}}
                            </ul>
                        </div>
                        
                        {{-- Settings Section --}}
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-4">
                            <h4 class="text-gray-700 dark:text-gray-300 text-lg font-semibold mb-2">{{ __('Settings') }}</h4>
                            <ul class="list-none p-0 m-0">
                                <li class="mb-2">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">{{ __('General Settings') }}</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">{{ __('Account Settings') }}</a>
                                </li>
                                {{-- Add more links as needed --}}
                            </ul>
                        </div>

                        {{-- Add more sections as needed --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    </x-slot>
</x-app-layout>
