<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Planning') }}
        </h2>

    </x-slot>

<x-table-calendar-full></x-table-calendar-full>

</x-app-layout>