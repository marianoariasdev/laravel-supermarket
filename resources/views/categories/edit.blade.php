<x-app-layout>

    <div class="max-w-2xl px-4 sm:px-6 lg:px-8 mx-auto text-black dark:text-white">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-gray-900">
            <div class=" mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-neutral-200">
                    New Category
                </h2>

                <form action={{ route('categories.update', $category->id) }} method="POST">
                    @csrf
                    @method('PUT')
                    <div
                        class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                        <label for="af-payment-billing-contact" class="inline-block text-sm font-medium dark:text-white">
                            Category Name
                        </label>

                        <div class="mt-2 space-y-3">
                            <input id="af-payment-billing-contact" type="text" name="name"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Category Name" value={{ $category->name }} required>

                        </div>

                        @error('name')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
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
