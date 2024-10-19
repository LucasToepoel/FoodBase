<div class="container my-4 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>
                                @auth
                                    <a href="{{ route('Product.create') }}" class="btn btn-success">ADD</a>
                                @else
                                    #
                                @endauth
                            </th>
                            <th>Name</th>
                            <th class="d-none d-md-table-cell">Calories</th>
                            <th class="d-none d-md-table-cell">Protein</th>
                            <th class="d-none d-md-table-cell">Carbs</th>
                            <th class="d-none d-md-table-cell">Fat</th>
                            <th class="d-none d-md-table-cell">EAN</th>
                            <th class="d-none d-md-table-cell">Tags</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $food)
                            <tr data-bs-toggle="collapse" data-bs-target="#details-{{ $food->id }}" class="accordion-toggle">
                                <th scope="row">{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</th>
                                <td>{{ $food->name }}</td>
                                <td class="d-none d-md-table-cell">{{ $food->nutrition->kcal }}</td>
                                <td class="d-none d-md-table-cell">{{ $food->nutrition->protein }}</td>
                                <td class="d-none d-md-table-cell">{{ $food->nutrition->carbs }}</td>
                                <td class="d-none d-md-table-cell">{{ $food->nutrition->fat }}</td>
                                <td class="d-none d-md-table-cell">
                                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($food->ean, 'EAN13') }}" alt="barcode" />
                                </td>
                                <td class="d-none d-md-table-cell">
                                    @foreach ($food->tags as $tag)
                                        <span class="badge" style="background-color: {{ $tag->color }}; color: white">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td colspan="9" class="hiddenRow p-0">
                                    <div class="collapse" id="details-{{ $food->id }}">
                                        <ul class="list-group">
                                            <li class="list-group-item d-md-none">Calories: {{ $food->nutrition->kcal }}</li>
                                            <li class="list-group-item d-md-none">Protein: {{ $food->nutrition->protein }}</li>
                                            <li class="list-group-item d-md-none">Carbs: {{ $food->nutrition->carbs }}</li>
                                            <li class="list-group-item d-md-none">Fat: {{ $food->nutrition->fat }}</li>
                                            <li class="list-group-item d-md-none">EAN: <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($food->ean, 'EAN13') }}" alt="barcode" /></li>
                                            <li class="list-group-item d-md-none">Tags:
                                                @foreach ($food->tags as $tag)
                                                    <span class="badge" style="background-color: {{ $tag->color }}; color: white">{{ $tag->name }}</span>
                                                @endforeach
                                            </li>
                                            <li class="list-group-item text-center">
                                                <a href="{{ route('Product.show', ['Product' => $food->id]) }}" class="btn btn-info">View</a>
                                                @auth
                                                    <a href="{{ route('Product.edit', ['Product' => $food->id]) }}" class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('Product.destroy', ['Product' => $food->id]) }}" method="post" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                @endauth
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
