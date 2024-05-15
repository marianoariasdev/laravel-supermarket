<x-app-layout>
    <header class="bg-white p-6 max-w-[600px] mx-auto">
        <div class="flex gap-4 mb-6 justify-between">
            <h1 class="font-bold text-lg  text-black dark:text-white block">Sale #{{ $sale->id }}</h1>
            <p class="inline text-black dark:text-white">{{ $sale->created_at->format('d/m/Y') }}</p>
        </div>
        {{-- <div>
            <ul>
                @foreach ($sale->bills as $bill)
                <li>{{ $bill->product->name }} - {{ $bill->quantity }}</li>
                @endforeach
            </ul>
        </div> --}}
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
                                        Product</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Quantity</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Price</th>
                                  
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($sale->bills as $index => $bill)
                                <tr>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $index + 1 }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $bill->product->name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $bill->quantity }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        ${{ $bill->price }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot> 
                                <tr>
                                    <td colspan="2" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        Total
                                    </td>
                                    <td></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        ${{ $sale->price }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </header>
</x-app-layout>