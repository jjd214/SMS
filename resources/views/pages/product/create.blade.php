<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Add product') }}
            </h2>
            <a href="{{ route('product.index') }}"
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('product.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="category" value="Select category" />
                        <select id="category" name="category_id"
                            class="block w-full mt-1 text-sm text-gray-700 dark:text-gray-300 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="category">
                            <option value="" disabled selected>Please select an option</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                            <span class="text-red-600"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-input-label for="supplier" value="Select supplier" />
                        <select id="supplier" name="supplier_id"
                            class="block w-full mt-1 text-sm text-gray-700 dark:text-gray-300 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="category">
                            <option value="" disabled selected>Please select an option</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                            <span class="text-red-600"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <x-input-label for="product_name" value="Product name" />
                            <x-text-input id="product_name" name="name" type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                placeholder="Enter product name" />
                            @error('name')
                                <span class="text-red-600"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="product_description" value="Product description" />
                            <x-text-input id="product_description" name="description" type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                placeholder="Enter short product description" />
                            @error('description')
                                <span class="text-red-600"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <div>
                            <x-input-label for="price" value="Price" />
                            <x-text-input id="price" name="price" type="number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                placeholder="Enter product price" />
                            @error('price')
                                <span class="text-red-600"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="cost_price" value="Cost price" />
                            <x-text-input id="cost_price" name="cost_price" type="number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                placeholder="Enter cost price" />
                            @error('cost_price')
                                <span class="text-red-600"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div>
                            <x-input-label for="quantity" value="Quantity" />
                            <x-text-input id="quantity" name="qty" type="number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                placeholder="Enter quantity" />
                            @error('qty')
                                <span class="text-red-600"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap 4 mb-4">
                        <div>
                            <x-input-label for="image" value="Product image" />
                            <x-text-input id="image" name="image" type="file"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" />
                            @error('image')
                                <span class="text-red-600"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="flex justify-start">
                        <button type="submit"
                            class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
