<x-app-layout>
    <div class="max-w-2xl md:max-w-6xl px-4 sm:px-6 lg:px-8 mx-auto text-black dark:text-white">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-gray-900">
            <div class=" mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-neutral-200 mb-6">
                    Edit Supplier
                </h2>

                <form action={{ route('suppliers.update', $supplier->id) }} method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    @method('PUT')
                    <div>

                        <div
                            class="py-4 first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                            <label for="af-payment-billing-contact"
                                class="inline-block text-sm font-medium dark:text-white">
                                Supplier Name
                            </label>

                            <div class="mt-2 space-y-3">
                                <input id="af-payment-billing-contact" type="text" name="name" value="{{ old('name') ?? $supplier->name }}"
                                    class="py-2 px-3 pe-11 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Supploer Name" required>

                            </div>

                            @error('name')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div
                            class="py-4 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                            <label for="description" class="inline-block text-sm font-medium dark:text-white">
                                Supplier Description
                            </label>

                            <div class="mt-2 space-y-3">
                                <input id="description" type="text" name="description" value="{{ old('description') ?? $supplier->description}}"
                                    class="py-2 px-3 pe-11 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Supplier Description">

                            </div>

                            @error('description')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div
                            class="py-4 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                            <label for="email" class="inline-block text-sm font-medium dark:text-white">
                                Supplier Email
                            </label>

                            <div class="mt-2 space-y-3">
                                <input id="email" type="email" name="email" value="{{ old('email') ?? $supplier->email }}"
                                    class="py-2 px-3 pe-11 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Supplier Email">

                            </div>

                            @error('email')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div>
                        <div
                            class="py-4 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                            <label for="phone" class="inline-block text-sm font-medium dark:text-white">
                                Supplier Phone
                            </label>

                            <div class="mt-2 space-y-3">
                                <input id="phone" type="tel" name="phone" value="{{ old('phone') ?? $supplier->phone}}"
                                    class="py-2 px-3 pe-11 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Supplier Phone">

                            </div>

                            @error('phone')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div
                            class="py-4 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                            <label for="type" class="inline-block text-sm font-medium dark:text-white">
                                Supplier Type
                            </label>

                            <div class="mt-2 space-y-3">
                                <select name="type" value="{{ old('type') }}" required
                                    class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    <option value="" class="text-gray-200" disabled>Select Supplier Type</option>
                                    <option value="products" 
                                        @selected(old('type', $supplier->type) == 'products')
                                    >
                                        Products
                                    </option>
                                    <option value="services"
                                        @selected(old('type', $supplier->type) == 'services')
                                    >
                                        Services
                                    </option>
                                </select>
                            </div>

                            @error('type')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="py-4 mt-2 md:mt-8 flex justify-end gap-x-2">
                            <button type="input"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Save changes
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>