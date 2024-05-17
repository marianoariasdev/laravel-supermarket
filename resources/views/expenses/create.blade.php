<x-app-layout>
    <div class="max-w-2xl px-4 sm:px-6 lg:px-8 mx-auto text-black dark:text-white">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-gray-900">
            <div class=" mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-neutral-200">
                    New Expense
                </h2>

                <form action={{ route('expenses.store') }} method="POST">
                    @csrf
                    <div
                        class="py-4 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                        <label for="supplier_id" class="inline-block text-sm font-medium dark:text-white">
                            Expense Supplier
                        </label>

                        <div class="mt-2 space-y-3">
                            <select name="supplier_id" value="{{ old('supplier_id') }}" required
                                class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <option value="" class="text-gray-200">Select Supplier</option>
                                @foreach ($suppliers as $supplier )
                                <option value={{ $supplier->id }} @selected(old('supplier_id' == $supplier->id))>{{
                                    $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('supplier_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div
                        class="py-4 first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                        <label for="description" class="inline-block text-sm font-medium dark:text-white">
                            Expense Description
                        </label>

                        <div class="mt-2 space-y-3">
                            <textarea id="description" name="description"
                                class="py-2 px-3 pe-11 h-auto block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Product Description" maxlength="255" required>{{ old('description') }}</textarea>

                        </div>

                        @error('description')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div
                        class="py-4 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                        <label for="amount" class="inline-block text-sm font-medium dark:text-white">
                            Expense Amount
                        </label>

                        <div class="mt-2 space-y-3">
                            <input id="amount" type="number" name="amount" value="{{ old('amount') }}"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Expense Amount" step=".01" required>

                        </div>

                        @error('amount')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div
                        class="py-4 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                        <label for="supplier_id" class="inline-block text-sm font-medium dark:text-white">
                            Expense Date
                        </label>

                        <div class="mt-2 space-y-3">
                            <input id="date" type="date" name="date" value="{{ old('date') }}"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Product date" required>
                        </div>

                        @error('date')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4 flex justify-end gap-x-2">
                        <button type="input"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>