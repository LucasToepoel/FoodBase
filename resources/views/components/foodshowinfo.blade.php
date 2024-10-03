<div>
<div class="card">
    <div class="card-header">
        {{ $product->name }}
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $product->nutrition->kcal }}</h5>
        <p class="card-text"><strong>Protein:</strong> {{ $product->nutrition->protein }}g</p>
        <p class="card-text"><strong>Carbs:</strong> {{ $product->nutrition->carbs }}g</p>
        <p class="card-text"><strong>Fat:</strong> {{ $product->nutrition->fat }}g</p>
        <p class="card-text">{{ $product->description }}</p>
    </div>
</div>
</div>
