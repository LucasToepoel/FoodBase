<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="container">
                @if($data->meals->isEmpty())
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">No meals created</h5>
                        </div>
                    </div>
                @else
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach($data->meals as $meal)
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $meal->name }}</h5>
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#meal-{{ $meal->id }}" aria-expanded="false" aria-controls="meal-{{ $meal->id }}">
                                        Show Products
                                    </button>
                                    <div class="collapse" id="meal-{{ $meal->id }}">
                                        <div class="card card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Item</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Calories</th>
                                                        <th scope="col">Protein</th>
                                                        <th scope="col">Carbs</th>
                                                        <th scope="col">Fat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($meal->products as $product)
                                                        <tr>
                                                            <td>{{ $product->name }}</td>
                                                            <td>{{ $product->nutrition->quantity }}</td>
                                                            <td>{{ $product->nutrition->calories }}</td>
                                                            <td>{{ $product->nutrition->protein }}</td>
                                                            <td>{{ $product->nutrition->carbs }}</td>
                                                            <td>{{ $product->nutrition->fat }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <canvas id="myPieChart" width="400" height="400"></canvas>
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
                data: [{{$data->total_protein}}, {{$data->total_carbs}}, {{$data->total_fat}}],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                datalabels: {
                    formatter: (value, ctx) => {
                        let sum = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                        let percentage = (value * 100 / sum).toFixed(2) + "%";
                        return percentage;
                    },
                    color: '#fff',
                },
                doughnutlabel: {
                    labels: [
                        {
                            text: 'Nutrition',
                            font: {
                                size: '20'
                            },
                            color: '#FF6384'
                        },
                        {
                            text: '500 kcal',
                            font: {
                                size: '16'
                            },
                            color: '#36A2EB'
                        }
                    ]
                }
            }
        },
        plugins: [ChartDataLabels, {
            beforeDraw: function(chart) {
                var width = chart.width,
                    height = chart.height,
                    ctx = chart.ctx;
                ctx.restore();
                var fontSize = (height / 200).toFixed(2);
                ctx.font = fontSize + "em sans-serif";
                ctx.textBaseline = "middle";
                var text = "{{$data->total_kcal}}",
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                    textY = height / 2;
                ctx.fillText(text, textX, textY);
                ctx.save();
            }
        }]
    });
</script>
