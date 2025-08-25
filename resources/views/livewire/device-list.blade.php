<div>
    <div class="mb-4 d-flex justify-content-center">
        <input type="text" wire:model="search" class="form-control w-50" placeholder="ابحث عن جهاز…" />
    </div>
    <div class="row">
        @foreach($devices as $device)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 text-center">
                    @if($device->image_path)
                        <img src="{{ Storage::url($device->image_path) }}" class="card-img-top" alt="{{ $device->title }}">
                    @else
                        <img src="{{ asset('img/fan.png') }}" class="card-img-top" alt="{{ $device->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $device->title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($device->description, 80) }}</p>
                        <p class="card-text">السعر: {{ $device->price }} دولار</p>
                        <a href="{{ route('general.form') }}" class="btn btn-primary">اطلب الآن</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $devices->links() }}
    </div>
</div>