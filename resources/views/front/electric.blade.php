@extends('layouts.front')

@section('title','الأجهزة الكهربائية')

@section('content')
    <!-- Hero section for electric devices -->
    <section class="hero" style="background-image: url('{{ asset('img/bg-banner.jpg') }}');">
        <div class="container text-center">
            <h1 class="mb-3">الأجهزة الكهربائية</h1>
            <p class="mb-0">أفضل الأجهزة المنزلية بجودة عالية وموثوقية لضمان راحتك</p>
        </div>
    </section>
    <!-- Devices list -->
    <div class="container py-5">
        <livewire:device-list />
    </div>
@endsection