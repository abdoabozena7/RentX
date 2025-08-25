@extends('layouts.front')

@section('title','قائمة السيارات')

@section('content')
    <!-- Search bar for filtering cars -->
    <div class="container">
        <div class="search-bar">
            <form>
                <div class="row g-2">
                    <!-- Pick-up location -->
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <select class="form-select" aria-label="مكان استلام السيارة">
                            <option selected>مكان استلام السيارة</option>
                            <option value="دمشق">دمشق</option>
                            <option value="ريف دمشق">ريف دمشق</option>
                            <option value="حلب">حلب</option>
                            <option value="حمص">حمص</option>
                            <option value="حماة">حماة</option>
                            <option value="اللاذقية">اللاذقية</option>
                            <option value="طرطوس">طرطوس</option>
                            <option value="إدلب">إدلب</option>
                            <option value="الرقة">الرقة</option>
                            <option value="دير الزور">دير الزور</option>
                            <option value="الحسكة">الحسكة</option>
                            <option value="درعا">درعا</option>
                            <option value="السويداء">السويداء</option>
                            <option value="القنيطرة">القنيطرة</option>
                        </select>
                    </div>
                    <!-- Drop-off location -->
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <select class="form-select" aria-label="مكان تسليم السيارة">
                            <option selected>مكان تسليم السيارة</option>
                            <option value="دمشق">دمشق</option>
                            <option value="ريف دمشق">ريف دمشق</option>
                            <option value="حلب">حلب</option>
                            <option value="حمص">حمص</option>
                            <option value="حماة">حماة</option>
                            <option value="اللاذقية">اللاذقية</option>
                            <option value="طرطوس">طرطوس</option>
                            <option value="إدلب">إدلب</option>
                            <option value="الرقة">الرقة</option>
                            <option value="دير الزور">دير الزور</option>
                            <option value="الحسكة">الحسكة</option>
                            <option value="درعا">درعا</option>
                            <option value="السويداء">السويداء</option>
                            <option value="القنيطرة">القنيطرة</option>
                        </select>
                    </div>
                    <!-- Number of days -->
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <input type="number" class="form-control" placeholder="عدد الأيام" min="1">
                    </div>
                    <!-- Booking date (HTML5) -->
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <input type="date" class="form-control" placeholder="تاريخ الحجز">
                    </div>
                    <!-- Booking time (HTML5) -->
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <input type="time" class="form-control" placeholder="وقت الحجز">
                    </div>
                    <!-- Car type -->
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <select class="form-select" aria-label="نوع السيارة">
                            <option selected>نوع السيارة</option>
                            <option value="تويوتا فورتشنر">تويوتا فورتشنر</option>
                            <option value="هيونداي فيرنا">هيونداي فيرنا</option>
                            <option value="فورد موستانغ">فورد موستانغ</option>
                            <option value="بي إم دبليو X5">بي إم دبليو X5</option>
                            <option value="كيا سبورتاج">كيا سبورتاج</option>
                            <option value="هيونداي توسان">هيونداي توسان</option>
                            <option value="مرسيدس E200">مرسيدس E200</option>
                        </select>
                    </div>
                    <!-- Search button -->
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <button class="btn-search" type="submit">بحث</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End of search bar -->

    <!-- Hero section for car list -->
    <section class="hero" style="background-image: url('{{ asset('img/car-rent-5.png') }}');">
        <div class="container text-center">
            <h1 class="mb-3">ابحث عن سياراتك</h1>
            <p class="mb-0">اختر السيارة المناسبة لرحلتك من مجموعتنا المتنوعة</p>
        </div>
    </section>

    <!-- Car list -->
    <div class="container py-5">
        <livewire:car-list />
    </div>
@endsection