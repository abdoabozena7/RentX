@extends('layouts.front')

@section('title','طلب خدمة شحن')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">طلب شحن</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('service.shipping') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">الاسم الكامل</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">كود الدولة</label>
            <select name="phone_code" class="form-select" style="max-width:120px" required>
                <option value="+963">+963 سوريا</option>
                <option value="+90">+90 تركيا</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">البلد</label>
            <select name="country" class="form-select" required>
                <option value="syria">سوريا</option>
                <option value="turkey">تركيا</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">نوع الشحن</label>
            <select name="shipping_type" class="form-select" required>
                <option value="land">شحن برى</option>
                <option value="sea">شحن بحرى</option>
                <option value="air">شحن جوى</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">تفاصيل أخرى</label>
            <textarea name="details" class="form-control" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">إرسال الطلب</button>
    </form>
</div>
@endsection