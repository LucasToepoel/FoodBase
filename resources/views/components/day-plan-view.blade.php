<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card-deck">
                <!-- Cards for meals will go here -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Meal 1</h5>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Meal 2</h5>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Meal 3</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <img src="path/to/placeholder-image.jpg" class="img-fluid" alt="Placeholder Image">
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
                data: [{{ 0 }}, {{ 0 }}, {{ 0 }}],
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
                            text: ' kcal',
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
