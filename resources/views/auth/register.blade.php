@extends('layouts.front')

@section('title', 'إنشاء حساب')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">إنشاء حساب جديد</h2>
    <form method="POST" action="{{ route('register.submit') }}" class="mx-auto" style="max-width: 500px;">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">الاسم الكامل</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">البريد الإلكترونى</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">كلمة المرور</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">إنشاء الحساب</button>
    </form>
    <p class="text-center mt-3">لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p>
</div>
@endsection