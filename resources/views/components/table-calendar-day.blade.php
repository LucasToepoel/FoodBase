<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center">
            @php
                $currentDate = request()->has('date') ? \Carbon\Carbon::parse(request('date')) : now();
                $previousDay = $currentDate->copy()->subDay();
                $nextDay = $currentDate->copy()->addDay();
            @endphp
            <h1>{{ $currentDate->format('Y') }}</h1>
            <h3>
                <button type="button" id="previousDayButton" class="btn btn-secondary mr-2"><</button>
                {{ $currentDate->format('F d, Y') }}
                <button type="button" id="nextDayButton" class="btn btn-secondary ml-2">></button>
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{ $currentDate->format('l') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @php
                            $isToday = $currentDate->isToday();
                        @endphp
                        <td @if($isToday) style="background-color: rgba(190, 255, 116, 0.464);"@endif>{{ $currentDate->day }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.getElementById('previousDayButton').addEventListener('click', function() {
        const previousDay = '{{ $previousDay->format('Y-m-d') }}';
        window.location.href = `?date=${previousDay}`;
    });

    document.getElementById('nextDayButton').addEventListener('click', function() {
        const nextDay = '{{ $nextDay->format('Y-m-d') }}';
        window.location.href = `?date=${nextDay}`;
    });

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('td').forEach(function(td) {
            td.addEventListener('click', function() {
                const day = td.innerText;
                const month = '{{ $currentDate->format('m') }}';
                const year = '{{ $currentDate->format('Y') }}';
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
