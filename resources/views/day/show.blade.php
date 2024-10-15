<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('DayPlanning')}}
            <h2 class="text-center">     {{\Carbon\Carbon::parse($data->date)->format('d-m-Y')}}</h2>

        </h2>

    </x-slot>

    <x-day-plan-view :data="$data"></x-day-plan-view>

</x-app-layout>
