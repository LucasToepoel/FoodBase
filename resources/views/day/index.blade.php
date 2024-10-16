<x-app-layout>
    @php
        // Save the value to the session if it's present in the request
        if (request()->has('view')) {
            session(['view' => request('view')]);
        }

        // Retrieve the value from the session, default to 0 if not set
        $value = session('view', 0);
    @endphp
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-4">
            {{ __('Planning') }}
        </h2>
        <div class="flex justify-center">
            <form action="" method="GET" class="mx-2">
                <input type="hidden" name="view" value="0">
                <button type="submit" class="px-4 py-2 border rounded">Month View</button>
            </form>
            <form action="" method="GET" class="mx-2">
                <input type="hidden" name="view" value="1">
                <button type="submit" class="px-4 py-2 border rounded">Week View</button>
            </form>
            <form action="" method="GET" class="mx-2">
                <input type="hidden" name="view" value="2">
                <button type="submit" class="px-4 py-2 border rounded">Day View</button>
            </form>
        </div>

        @switch($value)
            @case(0)
                <x-table-calendar-full></x-table-calendar-full>
                @break
            @case(1)
                <x-table-calendar-week></x-table-calendar-week>
                @break
            @case(2)
                <x-table-calendar-day></x-table-calendar-day>
                @break
        @endswitch
    </x-slot>
</x-app-layout>
