<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('View sale') }}
            </h2>
            <a href="{{ route('sale.index') }}"
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('sale.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="sale_made_by" value="Sale made by" />
                        <!-- Hidden input to store the user_id -->
                        <input type="hidden" name="user_id" value="{{ $sale->user->id }}" />

                        <!-- Visible input to display the user's name -->
                        <x-text-input id="user_name" name="user_name" type="text"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            value="{{ $sale->user->name }}" readonly />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="customer" value="Customer" />
                        <x-text-input id="customer_id" name="customer_id" type="text"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            value="{{ $sale->customer->name }}" readonly />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="product" value="Product" />
                        <x-text-input id="product_id" name="product_id" type="text"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            value="{{ $sale->product->name }}" readonly />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <x-input-label for="unit_price" value="Unit Price" />
                            <x-text-input id="unit_price" name="unit_price" type="number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                value="{{ $sale->sale_detail->unit_price }}" readonly />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="quantity" value="Quantity" />
                            <x-text-input id="qty" name="qty" type="number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                value="{{ $sale->sale_detail->qty }}" readonly />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-4">
                            <x-input-label for="total_amount" value="Total amount" />
                            <x-text-input id="total_amount" name="total_amount" type="number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                value="{{ $sale->total_amount }}" readonly />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="amount_paid" value="Amount paid" />
                            <x-text-input id="amount_paid" name="amount_paid" type="number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                value="{{ $sale->amount_paid }}" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="change_due" value="Change due" />
                            <x-text-input id="change_due" name="change_due" type="number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                value="{{ $sale->change_due }}" />
                        </div>
                    </div>

                    <div class="mb-4">
                        <x-text-input id="payment_method" name="payment_method" type="text"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            value="{{ $sale->payment->payment_method }}" readonly />
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectProduct = document.getElementById('product_id');
            const unitPriceInput = document.getElementById('unit_price');
            const availableQtyInput = document.getElementById('available_qty');
            const qtyInput = document.getElementById('qty');
            const totalAmountInput = document.getElementById('total_amount');
            const amountPaidInput = document.getElementById('amount_paid');
            const changeDueInput = document.getElementById('change_due');
            const totalPriceInput = document.getElementById('total_price');

            selectProduct.addEventListener('change', function() {
                const selectedOption = selectProduct.options[selectProduct.selectedIndex];

                const unitPrice = selectedOption.getAttribute('data-unit-price');
                const availableQty = selectedOption.getAttribute('data-available-qty');

                unitPriceInput.value = unitPrice;
                availableQtyInput.value = availableQty;
            });

            qtyInput.addEventListener('input', function() {
                totalAmountInput.value = unitPriceInput.value * qtyInput.value;
            });

            amountPaidInput.addEventListener('input', function() {
                changeDueInput.value = amountPaidInput.value - totalAmountInput.value;
                totalPriceInput.value = unitPriceInput.value * qtyInput.value;
            });
        });
    </script>

</x-app-layout>
