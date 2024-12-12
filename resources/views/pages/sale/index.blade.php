<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Sales') }}
            </h2>
            <a href="{{ route('sale.create') }}"
                class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                Add sale
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sale made by
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Customer name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total amount
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Amount paid
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Change due
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Created at
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
            <div class="mt-4">
                {{-- {{ $categories->links() }} --}}
            </div>
        </div>
    </div>
</x-app-layout>
