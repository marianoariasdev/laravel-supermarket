<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="mx-auto">
            <div class=" dark:bg-gray-900 overflow-hidden">
                <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-2 mb-2">
                    <div class="flex justify-between items-center bg-white p-8 rounded border">
                        <div>
                            <p class="text-gray-500 text-sm">Last 30 days</p>
                            <p>Sales Total Amount</p>
                        </div>
                        <p class="font-semibold">${{ $salesTotal }}</p>
                    </div>
                    <div class="flex justify-between items-center bg-white p-8 rounded border">
                        <div>
                            <p class="text-gray-500 text-sm">Last 30 days</p>
                            <p>Expenses Total Amount</p>
                        </div>
                        <p class="font-semibold">${{ $expensesTotal }}</p>
                    </div>
                    <div class="flex justify-between items-center bg-white p-8 rounded border">
                        <div>
                            <p class="text-gray-500 text-sm">Last 30 days</p>
                            <p>Balance</p>
                        </div>
                        <p
                            class="{{ $salesTotal - $expensesTotal < 0 ? 'text-red-500' : 'text-green-500' }} font-semibold">
                            ${{ $salesTotal - $expensesTotal }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-[3fr,2fr] gap-2 mb-2">
                    <div class="bg-white p-8 border">
                        <h2 class="mb-2">Recent Sales</h2>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        #
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Total Price
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Products Amount
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Date
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Created By
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($lastSales as $sale)
                                <tr>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $sale->id }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        ${{ $sale->price }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $sale->bills->sum('quantity') }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $sale->created_at->format('d/m/Y') }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $sale->user->name }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-white p-8 border">
                        <h2 class="mb-2">Recent Expenses</h2>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        #
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Amount
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Supplier
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($lastExpenses as $expense)
                                <tr>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $expense->id }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        ${{ $expense->amount }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $expense->supplier->name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $expense->date }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
                    <div class="bg-white p-8 rounded border">
                        <p class="text-gray-500 text-sm">Last 30 days</p>
                        <h2 class="mb-2">Most Selled Products</h2>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-2 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Product Name
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Quantity
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($mostSelledProducts as $product)
                                <tr>
                                    <td
                                        class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $product->name }}
                                    </td>
                                    <td
                                        class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $product->total }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-white p-8 rounded border">
                        <p class="text-gray-500 text-sm">Last 30 days</p>
                        <h2 class="mb-2">Most Selled Categories</h2>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-2 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Category Name
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Quantity
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($mostSelledByCategory as $category)
                                <tr>
                                    <td
                                        class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $category->name }}
                                    </td>
                                    <td
                                        class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $category->total }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-white p-8 rounded border">
                        <p class="text-gray-500 text-sm">Last 30 days</p>
                        <h2 class="mb-2">Users Who sold the most</h2>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-2 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        User Name
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Quantity
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($mostSelledByUser as $user)
                                <tr>
                                    <td
                                        class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $user->name }}
                                    </td>
                                    <td
                                        class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $user->total }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-white p-8 rounded border text-center">
                        <p class="text-gray-500 mb-2">{{ date('Y-m-d') }}</p>
                        <p class="font-semibold text-5xl" id="actual_time"></p>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

<script>
    const actualTime = document.getElementById('actual_time');

    
    function getTime() {
        const date = new Date();
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const seconds = String(date.getSeconds()).padStart(2, '0');
        
        actualTime.textContent = `${hours}:${minutes}:${seconds}`;
    }
    
    getTime();
    setInterval(getTime, 1000);
</script>