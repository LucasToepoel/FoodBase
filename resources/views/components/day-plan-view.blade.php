<div class="card">
    <div class="card-body" style="padding: 2rem;">
        <div class="row">
            <div class="col text-center">
            @foreach($meals as $meal)
                <div class="card mb-3">
                    <div class="card-header">
                        {{ $meal->name }}
                    </div>
                    <div class="card-body">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $meal->progress }}%;" aria-valuenow="{{ $meal->progress }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $meal->progress }}%
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        {{ $meal->type }}
                    </div>
                </div>
            @endforeach
            </div>
            <div class="col text-center">
                <!-- Second div content -->
                <p>Second div content</p>
                <img src="https://picsum.photos/200" alt="Random Image" class="img-fluid mx-auto d-block">
            </div>
        </div>
    </div>
</div>
