@extends('layouts.dashboard')

@section('title','لوحة التحكم')

@section('content')
<h2 class="mb-4">مرحباً بك فى لوحة التحكم</h2>
<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card text-center" style="background-color: var(--primary); color: var(--secondary);">
            <div class="card-body">
                <h5 class="card-title">عدد السيارات</h5>
                <p class="card-text display-4 mb-0">{{ $stats['cars'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-center" style="background-color: var(--accent); color: #ffffff;">
            <div class="card-body">
                <h5 class="card-title">عدد الأجهزة</h5>
                <p class="card-text display-4 mb-0">{{ $stats['devices'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-center" style="background-color: var(--highlight); color: #ffffff;">
            <div class="card-body">
                <h5 class="card-title">عمليات الشحن</h5>
                <p class="card-text display-4 mb-0">{{ $stats['shipments'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-center" style="background-color: var(--secondary); color: var(--primary);">
            <div class="card-body">
                <h5 class="card-title">طلبات الخدمات</h5>
                <p class="card-text display-4 mb-0">{{ $stats['requests'] }}</p>
            </div>
        </div>
    </div>
</div>
<p class="mt-4">اختر أحد العناصر من القائمة الجانبية لإدارة البيانات.</p>
@endsection