<x-app-layout>

    <div class="flex justify-between items-center mb-4">
        <h1 class="font-bold text-lg inline text-black dark:text-white">Suppliers</h1>
        @haspermission('suppliers.create')
        <a href="{{ route('suppliers.create') }}"
            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            New Supplier
        </a>
        @endhaspermission
    </div>

    <div class="flex flex-col bg-white dark:bg-gray-900">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border overflow-hidden dark:border-neutral-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    #
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    Name</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    Description</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    Email</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    Phone</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    Type</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    Action</th>

                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            @foreach ($suppliers as $supplier)
                            <tr>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                    {{ $supplier->id }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                    {{ $supplier->name }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                    {{ $supplier->description ?? '-' }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                    {{ $supplier->email ?? '-' }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                    {{ $supplier->phone ?? '-' }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                    {{ $supplier->type }}
                                </td>
                                <td class="flex gap-2 px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    @haspermission('suppliers.edit')
                                    <a href={{ route('suppliers.edit', $supplier->id) }}
                                        class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border
                                        border-transparent text-yellow-600 hover:text-yellow-800 disabled:opacity-50
                                        disabled:pointer-events-none dark:text-yellow-500 dark:hover:text-yellow-400">
                                        Edit
                                    </a>
                                    @endhaspermission
                                    @haspermission('suppliers.delete')
                                    <form action={{ route('suppliers.destroy', $supplier->id) }} method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400">
                                            Delete
                                        </button>
                                    </form>
                                    @endhaspermission
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                        <tfoot class="mt-4">
                            <tr>
                                <td colspan="6">
                                    <div class="px-6 py-3">
                                        {{ $suppliers->links() }}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>