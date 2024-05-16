<div class="grid grid-col-1 md:grid-cols-2 gap-8">
    <div class="    text-black dark:text-white">
        <!-- Card -->
        <div class=" bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-gray-900">
            <div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-neutral-200 mb-4">
                    Select Product
                </h2>

                <form wire:submit.prevent="addProduct">
                    <div
                        class="flex justify-between items-center gap-4 py-2 first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                        <div class="w-full">
                            <label for="product-name" class="inline-block text-sm font-medium dark:text-white">
                                Product Name
                            </label>

                            <div class="mt-2 space-y-3">
                                <select name="product_id" required wire:model="productId" id="product-name"
                                    wire:change="valuesSelected" wire:change="updatePrice($productId, $quantity)"
                                    class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    <option value="" class="text-gray-200">Select Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" @disabled($product->stock == 0)>{{ $product->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="w-fit">
                            <label for="product-name"
                                class="inline-block text-sm font-medium dark:text-white min-w-[90px]">
                                Product Price
                            </label>
                            <span class="py-1">${{ $productPrice }}</span>
                        </div>
                    </div>

                    <div
                        class="py-2 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                        <label for="product-quantity" class="inline-block text-sm font-medium dark:text-white">
                            Product Quantity
                        </label>

                        <div class="mt-2 space-y-3">
                            <input id="product-quantity" type="text" name="quantity" wire:model="quantity"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Product Quantity" required>
                        </div>
                    </div>

                    <div
                        class="py-2 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                        <label for="product-quantity" class="inline-block text-sm font-medium dark:text-white">
                            Price
                        </label>

                        <div class="mt-2 space-y-3">
                            <input id="product-quantity" type="number" name="quantity" wire:model="price"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Price" step=".01" required>
                        </div>
                    </div>

                    <div class="flex justify-end gap-x-2 mt-4">
                        <button type="submit"
                            class="py-2 px-3 inline-flex items-centertext-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Add Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class=" text-black dark:text-white bg-white dark:bg-gray-900 p-4 rounded-xl shadow sm:p-7">
        <h2 class="text-lg font-bold text-gray-800 dark:text-neutral-200 mb-4">List of Products</h2>
        @if ($salesProducts)
            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                <thead>
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                            Product Name</th>
                        <th scope="col"
                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                            Quantity</th>
                        <th scope="col"
                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                            Price</th>
                        <th scope="col"
                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                            Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salesProducts as $salesProduct)
                        <tr>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                {{ $salesProduct['name'] }}</td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                {{ $salesProduct['quantity'] }}</td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                ${{ $salesProduct['price'] }}</td>
                            <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                            <form wire:submit.prevent="removeSale({{$salesProduct['id']}})">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400">
                                    Delete
                                </button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td
                            class="font-semibold px-6 py-4 whitespace-nowrap text-sm  text-gray-800 dark:text-neutral-200">
                            Total</td>
                        <td
                            class="font-semibold px-6 py-4 whitespace-nowrap text-sm  text-gray-800 dark:text-neutral-200">
                        <td
                            class="font-semibold px-6 py-4 whitespace-nowrap text-sm  text-gray-800 dark:text-neutral-200">
                            ${{ $totalPrice }}</td>
                    </tr>
                </tfoot>
            </table>
            <form wire:submit.prevent="saveSale">
                <div class="flex justify-end gap-x-2 mt-4">
                    <button type="submit"
                        class="py-2 px-3 inline-flex items-centertext-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Save Sale
                    </button>
                </div>
            </form>
        @else
            <p class="text-gray-400">No products added yet.</p>
        @endif
    </div>
</div>
