<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center">
            @php
                $currentDate = request()->has('date') ? \Carbon\Carbon::parse(request('date')) : now();
                $startOfWeek = $currentDate->copy()->startOfWeek(\Carbon\Carbon::MONDAY);
                $endOfWeek = $currentDate->copy()->endOfWeek(\Carbon\Carbon::SUNDAY);
                $previousWeek = $startOfWeek->copy()->subWeek();
                $nextWeek = $startOfWeek->copy()->addWeek();
            @endphp
            <h1>{{ $startOfWeek->format('Y') }}</h1>
            <h3 class="d-flex justify-content-center align-items-center">
                <button type="button" id="previousWeekButton" class="btn btn-secondary mr-4"><</button>
                <span class="mx-3">{{ $startOfWeek->format('F d') }} - {{ $endOfWeek->format('F d') }}</span>
                <button type="button" id="nextWeekButton" class="btn btn-secondary ml-4">></button>
            </h3>
        </div>
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
                    <tr>
                        @for ($day = 0; $day < 7; $day++)
                            @php
                                $currentDay = $startOfWeek->copy()->addDays($day);
                                $isToday = $currentDay->isToday();
                            @endphp
                            <td @if($isToday) style="background-color: rgba(190, 255, 116, 0.464);"@endif>{{ $currentDay->day }}</td>
                        @endfor
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.getElementById('previousWeekButton').addEventListener('click', function() {
        const previousWeek = '{{ $previousWeek->format('Y-m-d') }}';
        window.location.href = `?date=${previousWeek}`;
    });

    document.getElementById('nextWeekButton').addEventListener('click', function() {
        const nextWeek = '{{ $nextWeek->format('Y-m-d') }}';
        window.location.href = `?date=${nextWeek}`;
    });

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('td').forEach(function(td) {
            td.addEventListener('click', function() {
                const day = td.innerText;
                const month = '{{ $startOfWeek->format('m') }}';
                const year = '{{ $startOfWeek->format('Y') }}';
                const date = `${year}-${month}-${day}`;

                // Use Laravel to generate the base URL
                const baseUrl = "{{ route('Day.show') }}";
                // Append the date parameter to the base URL
                const url = `${baseUrl}?date=${date}`;

                window.location.href = url;
            });
        });
    });
</script>
