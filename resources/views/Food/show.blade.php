<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('FoodIndex') }}
        </h2>

    </x-slot>

<x-databaseview.foodshowinfo :product="$product" />

<x-slot name="footer">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
        {{ __('All rights reserved') }}
    </h2>
</x-slot>
</x-app-layout>
