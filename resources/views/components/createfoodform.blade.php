<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1></h1>
                </div>
                <div class="card-body">
                    <form action="{{ isset($product) ? route('Product.update', $product->id) : route('Product.store') }}" method="POST">
                        @csrf
                        @if(isset($product))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="ean">EAN:</label>
                            <input type="text" class="form-control" id="ean" name="ean" value="{{ $product->ean ?? session('ean') }}" placeholder="click me, upload image of EAN code" readonly onclick="document.getElementById('barcode').click();">
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="calories">Calories:</label>
                            <input type="number" class="form-control" id="calories" name="calories" value="{{ $product->nutrition->kcal ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="protein">Protein:</label>
                            <input type="number" class="form-control" id="protein" name="protein" value="{{ $product->nutrition->protein ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="carbs">Carbs:</label>
                            <input type="number" class="form-control" id="carbs" name="carbs" value="{{ $product->nutrition->carbs ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="fat">Fat:</label>
                            <input type="number" class="form-control" id="fat" name="fat" value="{{ $product->nutrition->fat ?? '' }}">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                    <div class="form-group text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                    </div>
                    <form action="{{ route('Product.uploadBarcode') }}" method="POST" enctype="multipart/form-data" id="barcodeForm" style="display: none;">
                        @csrf
                        <input type="file" class="form-control-file" id="barcode" name="barcode" onchange="document.getElementById('barcodeForm').submit()">
                    </form>
                </div>
                <div class="card-footer">

            </div>

        </div>
    </div>
</div>
