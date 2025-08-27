<div>
    <!-- This hidden search field could be used to find a car by name if desired, but it is hidden by default because the search bar is displayed at the top of the page -->
    <div class="mb-4 d-none">
        <input type="text" wire:model="search" class="form-control w-50 mx-auto" placeholder="ابحث عن سيارة…" />
    </div>
    <div class="row">
        @foreach($cars as $car)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card-car text-center h-100">
                    <div class="mb-3">
                        @if($car->image_path)
                            <img src="{{ Storage::url($car->image_path) }}" alt="{{ $car->name }}">
                        @else
                            <img src="{{ asset('img/car-rent-1.png') }}" alt="{{ $car->name }}">
                        @endif
                    </div>
                    <h4 class="name">{{ $car->name }}</h4>
                    <div class="attributes">
                        <div class="px-2 d-flex align-items-center">
                            <i class="fa fa-car text-primary me-1"></i>
                            <span>{{ $car->model }}</span>
                        </div>
                        <div class="px-2 d-flex align-items-center">
                            <i class="fa fa-cog text-primary me-1"></i>
                            <span>AUTO</span>
                        </div>
                        <div class="px-2 d-flex align-items-center">
                            <i class="fa fa-road text-primary me-1"></i>
                            <span>25K</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <!-- Button triggers modal instead of navigating to a new page -->
                        <button type="button" class="btn-action" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $car->id }}">
                            احجز الآن
                        </button>
                    </div>
                </div>
                <!-- Booking Modal for this car -->
                <div class="modal fade" id="bookingModal{{ $car->id }}" tabindex="-1" aria-labelledby="bookingModalLabel{{ $car->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content p-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bookingModalLabel{{ $car->id }}">طلب حجز - {{ $car->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Car details summary -->
                                <div class="d-flex align-items-center mb-3">
                                    @if($car->image_path)
                                        <img src="{{ Storage::url($car->image_path) }}" alt="{{ $car->name }}" style="width:100px;height:80px;object-fit:contain;border-radius:4px;background-color:#f9f9f9;">
                                    @else
                                        <img src="{{ asset('img/car-rent-1.png') }}" alt="{{ $car->name }}" style="width:100px;height:80px;object-fit:contain;border-radius:4px;background-color:#f9f9f9;">
                                    @endif
                                    <div class="ms-3">
                                        <h6 class="mb-1">{{ $car->name }}</h6>
                                        <p class="mb-0 text-muted">الموديل: {{ $car->model }} | السعر اليومى: {{ $car->price_per_day }} جنيه</p>
                                    </div>
                                </div>
                                <!-- Booking form -->
                                <form method="POST" action="{{ route('service.car') }}">
                                    @csrf
                                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">الاسم الكامل</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">كود الدولة</label>
                                            <select name="phone_code" class="form-select" required>
                                                <option value="+963">+963 سوريا</option>
                                                <option value="+90">+90 تركيا</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">رقم الهاتف</label>
                                            <input type="text" name="phone" class="form-control" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">البلد</label>
                                            <select name="country" class="form-select" required>
                                                <option value="syria">سوريا</option>
                                                <option value="turkey">تركيا</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label">تفاصيل أخرى</label>
                                            <textarea name="details" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn-action">إرسال الطلب</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $cars->links() }}
    </div>
</div>