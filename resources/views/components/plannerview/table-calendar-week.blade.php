<div class="container mt-4">
    <div class="card p-0 p-md-3">
        <div class="card-header text-center p-1 p-md-3">
            @php
                $currentDate = request()->has('date') ? \Carbon\Carbon::parse(request('date')) : now();
                $startOfWeek = $currentDate->copy()->startOfWeek(\Carbon\Carbon::MONDAY);
                $endOfWeek = $currentDate->copy()->endOfWeek(\Carbon\Carbon::SUNDAY);
                $previousWeek = $startOfWeek->copy()->subWeek();
                $nextWeek = $startOfWeek->copy()->addWeek();
            @endphp
            <h1>{{ $startOfWeek->format('Y') }}</h1>
            <h3 class="d-flex justify-content-center align-items-center">
                <button type="button" id="previousWeekButton" class="btn btn-secondary mr-1 mr-md-2"><</button>
                <span class="mx-3">{{ $startOfWeek->format('F d') }} - {{ $endOfWeek->format('F d') }}</span>
                <button type="button" id="nextWeekButton" class="btn btn-secondary ml-1 ml-md-2">></button>
            </h3>
        </div>
        <div class="card-body p-1 p-md-2">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="thead-dark text-center">
                        <tr>
                            @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                            <th scope="col" class="d-none d-md-table-cell" style="white-space: nowrap;">{{ $day }}</th> <!-- Full day of the week for medium screens -->
                            <th scope="col" class="d-sm-none">{{ substr($day, 0, 1) }}</th> <!-- First three letters of the day of the week for extra small screens -->
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            @for ($day = 0; $day < 7; $day++)
                                @php
                                    $currentDay = $startOfWeek->copy()->addDays($day);
                                    $isToday = $currentDay->isToday();
                                @endphp
                                <td class="p-1 p-md-2" @if($isToday) style="background-color: rgba(190, 255, 116, 0.464);"@endif>{{ $currentDay->day }}</td>
                            @endfor
                        </tr>
                    </tbody>
                </table>
            </div>
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
