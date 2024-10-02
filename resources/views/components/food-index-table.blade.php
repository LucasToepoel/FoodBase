
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Food List</div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                    <th>Carbs</th>
                                    <th>Fat</th>
                                    <th>EAN</th>
                                    <th>Tags</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $food)
                                    <tr>
                                        <th scope="row">{{ $food->id }}</th>
                                        <td>{{ $food->name }}</td>
                                        <td>{{ $food->nutrition->kcal }}</td>
                                        <td>{{ $food->nutrition->protein }}</td>
                                        <td>{{ $food->nutrition->carbs }}</td>
                                        <td>{{ $food->nutrition->fat }}</td>
                                        <td>
                                            <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($food->ean, 'EAN13') }}" alt="barcode" />
                                        </td>
                                        <td>
                                            @foreach ($food->tags as $tag)
                                                <span class="badge" style="background-color: {{ $tag->color }}; color: white">{{ $tag->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-primary">View</a>
                                            <a href="" class="btn btn-warning">Edit</a>
                                            <form action="" method="post" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

