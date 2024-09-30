
    @extends('layouts.app')


@section('content')
    <div class="container">
        <h1>{{$h1}}</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Calories</th>
                    <th>Protein</th>
                    <th>Carbs</th>
                    <th>Fat</th>
                    <th>EAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $food)

                    <tr>
                        <td>{{ $food->name }}</td>
                        @if ($food->nutrition)
                        <td>{{ $food->nutrition->kcal }}</td>
                        <td>{{ $food->nutrition->protein }}</td>
                        <td>{{ $food->nutrition->carbs }}</td>
                        <td>{{ $food->nutrition->fat }}</td>
                    @else
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        @endif
                    <td>
                        <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($food->ean, 'EAN13') }}" alt="barcode" />
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection

