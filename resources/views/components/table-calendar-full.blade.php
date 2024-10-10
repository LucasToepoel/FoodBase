<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center">

        @php
            $currentMonth = request()->has('date') ? \Carbon\Carbon::parse(request('date')) : now();
            $previousMonth = $currentMonth->copy()->subMonth();
            $nextMonth = $currentMonth->copy()->addMonth();
            $daysInMonth = $currentMonth->daysInMonth;
            $firstDayOfMonth = $currentMonth->startOfMonth()->dayOfWeekIso;
            $daysInPreviousMonth = $previousMonth->daysInMonth;
            $currentYear = $currentMonth->year;
            $currentDay = 1;
        @endphp
    <h1>{{$currentMonth->year}}</h1>
        <h3>
            <button type="button" id="previousMonthButton" class="btn btn-secondary mr-2"><</button>
            {{ $currentMonth->format('F') }}
            <button type="button" id="nextMonthButton" class="btn btn-secondary ml-2">></button>
        </h3>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Mon</th>
                        <th scope="col">Tue</th>
                        <th scope="col">Wed</th>
                        <th scope="col">Thu</th>
                        <th scope="col">Fri</th>
                        <th scope="col">Sat</th>
                        <th scope="col">Sun</th>
                    </tr>
                </thead>
                <tbody>
                @for ($week = 0; $week < 6; $week++)
                    <tr>
                        @for ($day = 1; $day <= 7; $day++)
                            @if ($week === 0 && $day < $firstDayOfMonth)
                                <td class="text-muted" style="background-color: rgba(128, 128, 128, 0.2);">{{ $daysInPreviousMonth - ($firstDayOfMonth - $day) + 1 }}</td>
                            @elseif ($currentDay > $daysInMonth)
                                @php
                                    $nextMonthDay = $currentDay - $daysInMonth;
                                    $currentDay++;
                                @endphp
                                <td class="text-muted" style="background-color: rgba(128, 128, 128, 0.2);">{{ $nextMonthDay }}</td>
                            @else
                                @php
                                    $isToday = $currentDay == now()->day && $currentMonth->isSameMonth(now());
                                @endphp
                                <td @if($isToday) style="background-color: rgba(190, 255, 116, 0.464);"@endif>{{ $currentDay }}</td>
                                @php $currentDay++; @endphp
                            @endif
                        @endfor
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
    document.getElementById('previousMonthButton').addEventListener('click', function() {
        const previousMonth = '{{ $previousMonth->format('Y-m-d') }}';
        window.location.href = `?date=${previousMonth}`;
    });

    document.getElementById('nextMonthButton').addEventListener('click', function() {
        const nextMonth = '{{ $nextMonth->format('Y-m-d') }}';
        window.location.href = `?date=${nextMonth}`;
    });

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('td').forEach(function(td) {
            td.addEventListener('click', function() {
                const day = td.innerText;
                const month = '{{ $currentMonth->format('m') }}';
                const year = '{{ $currentMonth->format('Y') }}';
                const date = `${year}-${month}-${day}`;

                // Use Laravel to generate the base URL
                const baseUrl = "{{ route('Day.show') }}";
                // Append the date parameter to the base URL
                const url = `${baseUrl}?date=${date}`;

                window.location.href = url;
            });
        });
    });


    document.querySelectorAll('td.text-muted').forEach(function(td) {
        td.addEventListener('click', function() {
            const month = td.innerText > 15 ? '{{ $previousMonth->format('Y-m') }}' : '{{ $nextMonth->format('Y-m') }}';
            window.location.href = `?month=${month}`;
        });
    });
</script>
