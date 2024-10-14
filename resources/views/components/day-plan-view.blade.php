<div class="card">
    <div class="card-body" style="padding: 2rem;">
        <div class="row">
            <div class="col text-center">
            @php
            use App\Models\NutritionDayPlan;

            $dayplan = NutritionDayPlan::where('date', '2024-10-11')->first();
            $meals = $dayplan->meals->collect() ?? null;
            $kcalsum = $meals->sum(function($meal) {
                return $meal->products->sum(function($product) {
                    return $product->nutrition->kcal;
                });
            });

            $proteinSum = $meals->sum(function($meal) {
                return $meal->products->sum(function($product) {
                    return $product->nutrition->protein;
                });
            });

            $carbsSum = $meals->sum(function($meal) {
                return $meal->products->sum(function($product) {
                    return $product->nutrition->carbs;
                });
            });

            $fatSum = $meals->sum(function($meal) {
                return $meal->products->sum(function($product) {
                    return $product->nutrition->fat;
                });
            });
            @endphp
            <h1>{{ $kcalsum }}</h1>
            @foreach($meals as $meal)
                <div class="card mb-3">
                <div class="card-header">
                    {{ $loop->iteration }}.
                    {{ $meal->name }}
                </div>
                <div class="card-body">
                    <p>{{ $meal->description }}</p>
                    @php
                    $products = $meal->products ?? collect();
                    @endphp
                    @foreach ($products as $product )
                    <div class="card mb-3">
                        <div class="card-header">
                            {{ $loop->iteration }}.
                        {{ $product->name }}
                        </div>
                        <div class="card-body">
                        <p>KCAL: {{ $product->nutrition->kcal }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                </div>
            @endforeach
            </div>
            <div class="col text-center">
                <!-- Second div content -->
                <canvas id="myPieChart"></canvas>

            </div>
        </div>
    </div>
</div>



<script>
    var ctx = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Protein', 'Carbs', 'Fat'],
            datasets: [{
                data: [{{ $proteinSum }}, {{ $carbsSum }}, {{ $fatSum }}],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                doughnutlabel: {
                    labels: [
                        {
                            text: 'Nutrition',
                            font: {
                                size: '20'
                            }
                        },
                        {
                            text: '{{ $kcalsum }} kcal',
                            font: {
                                size: '16'
                            },
                            color: '#FF6384'
                        }
                    ]
                }
            }
        }
    });
</script>
