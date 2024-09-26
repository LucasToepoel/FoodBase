
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
                        <td>{{ $food->calories }}</td>
                    <td>{{ $food->protein }}</td>
                    <td>{{ $food->carbs }}</td>
                    <td>{{ $food->fat }}</td>
                    <td>{{ $food->ean }}</td>
                    <td>
                        <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($food->ean, 'EAN13') }}" alt="barcode" />
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection

