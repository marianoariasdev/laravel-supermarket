<?php

$items = [
    ['name' => 'Categories', 'route' => 'categories.index'],
    ['name' => 'Products', 'route' => 'products.index'],
    ['name' => 'Sales', 'route' => 'sales.index'],
    ['name' => 'Users', 'route' => 'users.index']
]

?>

<nav class="relative w-full mx-auto bg-white border-b border-gray-200 py-2 px-4 sm:py-0 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 xl:border-x dark:bg-gray-900 dark:border-neutral-700"
    aria-label="Global">
    <div class="flex items-center justify-between">
        <a class="flex item-center text-xl font-semibold dark:text-white gap-2" href={{ route('dashboard') }} aria-label="Brand">
            <img src={{ asset('cart.svg') }} alt="superMarket logo" class="w-6 h-6">
            <span>{{ env('APP_NAME') }}</span>
        </a>
        <div class="sm:hidden">
            <button type="button"
                class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-900 dark:hover:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation"
                aria-label="Toggle navigation">
                <svg class="hs-collapse-open:hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" x2="21" y1="6" y2="6" />
                    <line x1="3" x2="21" y1="12" y2="12" />
                    <line x1="3" x2="21" y1="18" y2="18" />
                </svg>
                <svg class="hs-collapse-open:block hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>
        </div>
    </div>
    <div id="navbar-collapse-with-animation"
        class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
        <div
            class="flex flex-col gap-y-4 gap-x-0 mt-5 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:ps-7 sm:px-4">
            @foreach ($items as $item)
            <a class="font-medium text-gray-500 hover:text-gray-400 sm:py-6 dark:text-neutral-400 dark:hover:text-neutral-500"
                href="{{ route($item['route']) }}">{{ $item['name'] }}</a>
            @endforeach

        </div>
    </div>

    <a class="flex items-center gap-x-2 font-medium text-gray-500 hover:text-blue-600 sm:border-s sm:border-gray-300 sm:my-6 sm:ps-6 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-blue-500"
        href="#">
        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            viewBox="0 0 16 16">
            <path
                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
        </svg>
        Log in
    </a>
    </div>
    </div>
</nav>