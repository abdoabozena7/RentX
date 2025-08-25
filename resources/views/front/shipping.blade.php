@extends('layouts.front')

@section('title','الشحن والجمارك')

@section('content')
    <!-- Hero section for shipping & customs -->
    <section class="hero" style="background-image: url('{{ asset('img/tartous.png') }}');">
        <div class="container text-center">
            <h1 class="mb-3">الشحن والتخليص الجمركي</h1>
            <p class="mb-0">نقل آمن، تخليص سريع، ودعم متواصل لعملائنا داخل سوريا وخارجها</p>
        </div>
    </section>

    <!-- Services section for shipping -->
    <section class="services">
        <div class="container">
            <h2 class="text-center mb-4">خدماتنا</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="service-card text-center h-100">
                        <i class="fa fa-headset"></i>
                        <h4>دعم العملاء 24/7</h4>
                        <p>تابع شحنتك فى أى وقت مع فريق خدمة العملاء المتواجد على مدار الساعة للإجابة على استفساراتك.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="service-card text-center h-100">
                        <i class="fa fa-truck"></i>
                        <h4>الشحن المحلى والدولى</h4>
                        <p>نقدم خدمات شحن موثوقة داخل سوريا وإلى الدول العربية والتركية مع حلول تتبع حديثة.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="service-card text-center h-100">
                        <i class="fa fa-shield-alt"></i>
                        <h4>التخليص الجمركى</h4>
                        <p>تخليص سريع واحترافى فى موانئ طرطوس واللاذقية وغيرها لتسهيل عملية استيراد وتصدير بضائعك.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to action / discount -->
    <section class="py-5" style="background-color: var(--accent-light);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="mb-3">عرض خاص للأعضاء الجدد</h3>
                    <p class="mb-4">سجّل الآن واحصل على خصم 30% على أول شحنة لك حتى نهاية أغسطس 2025.</p>
                </div>
                <div class="col-lg-4 text-lg-end text-center">
                    <a href="{{ route('register') }}" class="btn-cta">سجل الآن</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Shipments list -->
    <div class="container py-5">
        <h2 class="text-center mb-4">الشحنات الحالية</h2>
        <livewire:shipping-list />
    </div>
@endsection