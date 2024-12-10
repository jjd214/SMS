<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit customer') }}
            </h2>
            <a href="{{ route('customer.index') }}"
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('customer.update', $customer->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <x-input-label for="customer_name" value="Name" />
                            <x-text-input id="customer_name" name="name" type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                placeholder="Enter customer name" value="{{ $customer->name }}" />
                            @error('name')
                                <span class="text-red-600"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-input-label for="phone" value="Phone number" />
                            <x-text-input id="phone_number" name="phone" type="number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                placeholder="Enter supplier phone number" value="{{ $customer->phone }}" />
                            @error('phone')
                                <span class="text-red-600"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <x-input-label for="email" value="Email" />
                            <x-text-input id="email" name="email" type="email"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                placeholder="Enter supplier email" value="{{ $customer->email }}" />
                            @error('email')
                                <span class="text-red-600"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-input-label for="address" value="Address" />
                            <x-text-input id="address" name="address" type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                placeholder="Enter supplier address" value="{{ $customer->address }}" />
                            @error('address')
                                <span class="text-red-600"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
