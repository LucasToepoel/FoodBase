<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('FoodIndex') }}
        </h2>

    </x-slot>

<x-databaseview.food-index-table :products="$products" />


</x-app-layout>
