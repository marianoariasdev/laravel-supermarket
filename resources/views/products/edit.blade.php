<x-app-layout>

    <div class="max-w-2xl px-4 sm:px-6 lg:px-8 mx-auto text-black dark:text-white">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-gray-900">
            <div class=" mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-neutral-200">
                    Edit Product
                </h2>

                <form action={{ route('products.update', $product->id) }} method="POST">
                    @csrf
                    @method('PUT')
                    <div
                        class="py-6 first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                        <label for="af-payment-billing-contact"
                            class="inline-block text-sm font-medium dark:text-white">
                            Product Name
                        </label>

                        <div class="mt-2 space-y-3">
                            <input id="af-payment-billing-contact" type="text" name="name"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Product Name" value={{ $product->name }} required>

                        </div>
                    </div>

                    <div
                        class="py-6 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                        <label for="af-payment-billing-contact"
                            class="inline-block text-sm font-medium dark:text-white">
                            Product Price
                        </label>

                        <div class="mt-2 space-y-3">
                            <input id="af-payment-billing-contact" type="number" name="price"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Product Price" step=".01" value={{ $product->price }} required>

                        </div>
                    </div>

                    <div
                        class="py-6 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                        <label for="af-payment-billing-contact"
                            class="inline-block text-sm font-medium dark:text-white">
                            Product Category
                        </label>

                        <div class="mt-2 space-y-3">
                            <select name="category_id" value="{{ old('category_id') }}" required
                                class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <option value="" class="text-gray-200" disabled>Select Category</option>
                                @foreach ($categories as $category )
                                <option value={{ $category->id }} @selected($category->id == $product->category_id)>{{
                                    $category->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div
                        class="py-6 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                        <label for="af-payment-billing-contact"
                            class="inline-block text-sm font-medium dark:text-white">
                            Product Stock
                        </label>

                        <div class="mt-2 space-y-3">
                            <input id="af-payment-billing-contact" type="number" name="stock"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Product Price" step=".01" value={{ $product->stock }} required>

                        </div>
                    </div>

                    <div class="flex justify-end gap-x-2">
                        <button type="input"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>