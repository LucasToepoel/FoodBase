
<div class="container">
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Calories</th>
                <th>Protein</th>
                <th>Carbs</th>
                <th>Fat</th>
                <th>EAN</th>
                <th>Tags</th>
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
                    <td>
                        @foreach ($food->tags as $tag)
                            <span class="badge" style="background-color: {{ $tag->color }}; color: white">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
