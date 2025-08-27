@extends('layouts.front')

@section('title','طلب خدمة سيارة')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">طلب حجز سيارة</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card-car p-4">
                <form method="POST" action="{{ route('service.car') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">الاسم الكامل</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="row">
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
                    </div>
                    <div class="mb-3">
                        <label class="form-label">البلد</label>
                        <select name="country" class="form-select" required>
                            <option value="syria">سوريا</option>
                            <option value="turkey">تركيا</option>
                        </select>
                    </div>

                    @php
                        $selectedCar = isset($car) ? $car : null;
                    @endphp
                    @if($selectedCar)
                        <!-- Display information about the selected car and avoid asking for the car type again -->
                        <div class="mb-3">
                            <label class="form-label">السيارة المختارة</label>
                            <div class="d-flex align-items-center">
                                @if($selectedCar->image_path)
                                    <img src="{{ Storage::url($selectedCar->image_path) }}" alt="{{ $selectedCar->name }}" style="width:60px;height:40px;object-fit:cover;border-radius:4px;margin-left:0.5rem;">
                                @else
                                    <img src="{{ asset('img/car-rent-1.png') }}" alt="{{ $selectedCar->name }}" style="width:60px;height:40px;object-fit:cover;border-radius:4px;margin-left:0.5rem;">
                                @endif
                                <div>
                                    <h6 class="mb-1">{{ $selectedCar->name }}</h6>
                                    <p class="mb-0 text-muted">الموديل: {{ $selectedCar->model }}</p>
                                    <p class="mb-0 text-muted">السعر اليومى: {{ $selectedCar->price_per_day }} جنيه</p>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="car_id" value="{{ $selectedCar->id }}">
                    @else
                        <!-- If there is no selected car, display a list of car types -->
                        <div class="mb-3">
                            <label class="form-label">نوع السيارة</label>
                            <select name="car_type" class="form-select" required>
                                <option value="مرسيدس">مرسيدس</option>
                                <option value="بي إم دبليو">بي إم دبليو</option>
                                <option value="هيونداى">هيونداى</option>
                                <option value="كيا">كيا</option>
                                <option value="تويوتا">تويوتا</option>
                                <option value="أودى">أودى</option>
                                <option value="هوندا">هوندا</option>
                            </select>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">تفاصيل أخرى</label>
                        <textarea name="details" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn-action w-100">إرسال الطلب</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection