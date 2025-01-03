
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create Food
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Product.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="ean">EAN:</label>
                                <input type="text" class="form-control" id="ean" name="ean"
                                       value="{{ session('ean') }}"
                                       placeholder="Click to upload image of EAN code"
                                       readonly
                                       onclick="document.getElementById('barcode').click();">
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="calories">Calories:</label>
                                <input type="number" class="form-control" id="calories" name="calories" value="{{ old('calories') }}">
                            </div>
                            <div class="form-group">
                                <label for="protein">Protein:</label>
                                <input type="number" class="form-control" id="protein" name="protein" value="{{ old('protein') }}">
                            </div>
                            <div class="form-group">
                                <label for="carbs">Carbs:</label>
                                <input type="number" class="form-control" id="carbs" name="carbs" value="{{ old('carbs') }}">
                            </div>
                            <div class="form-group">
                                <label for="fat">Fat:</label>
                                <input type="number" class="form-control" id="fat" name="fat" value="{{ old('fat') }}">
                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Barcode upload form -->
        <form action="{{ route('Product.uploadBarcode') }}" method="POST" enctype="multipart/form-data" id="barcodeForm" style="display: none;">
            @csrf
            <input type="file" class="form-control-file" id="barcode" name="barcode" onchange="document.getElementById('barcodeForm').submit()">
        </form>
    </div>

