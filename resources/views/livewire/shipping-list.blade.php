<div>
    <div class="mb-4 d-flex justify-content-center">
        <input type="text" wire:model="search" class="form-control w-50" placeholder="ابحث عن خدمة…" />
    </div>
    <div class="row">
        @foreach($shipments as $sh)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{ $sh->type }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($sh->description, 80) }}</p>
                        <p class="card-text">الحالة: {{ $sh->status }}</p>
                        <a href="{{ route('shipping.form') }}" class="btn btn-primary">اطلب الخدمة</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $shipments->links() }}
    </div>
</div>