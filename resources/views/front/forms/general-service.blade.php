@extends('layouts.front')

@section('title','طلب خدمة عامة')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">نموذج طلب خدمة عامة</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('service.general') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">الاسم الكامل</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
            <label for="phone_code" class="form-label">كود الدولة</label>
            <select name="phone_code" id="phone_code" class="form-select" required style="max-width:120px">
                <option value="+963">+963 سوريا</option>
                <option value="+90">+90 تركيا</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" id="phone" required>
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">البلد</label>
            <select name="country" id="country" class="form-select" required>
                <option value="syria">سوريا</option>
                <option value="turkey">تركيا</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="details" class="form-label">تفاصيل إضافية</label>
            <textarea name="details" class="form-control" id="details" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">إرسال الطلب</button>
    </form>
</div>
@endsection