<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('DayPlanning')}}
            <h2 class="text-center">     {{\Carbon\Carbon::parse($date)->format('d-m-Y')}}</h2>

        </h2>

    </x-slot>

    <x-day-plan-view></x-day-plan-view>

</x-app-layout>
