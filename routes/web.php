<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| هنا يمكنك تسجيل مسارات الويب الخاصة بتطبيقك.
| هذه المسارات يتم تحميلها بواسطة RouteServiceProvider.
| لقد تم ترتيبها بحيث تكون داخل مجموعة "web" التى تشمل
| تعريف الجلسة، CSRF، وغيرها من الميزات.
*/

// صفحات الموقع الأمامية
// اجعل الصفحة الرئيسية (landing) دائماً صفحة تسجيل الدخول
Route::get('/', function() {
    // إذا كان المستخدم بالفعل مسجلاً دخوله، يمكن إعادة توجيهه إلى لوحة التحكم أو الصفحة الرئيسية حسب الحاجة
    return redirect()->route('login');
});
// الصفحة الرئيسية للموقع بعد تسجيل الدخول يمكن الوصول إليها عبر /home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/cars', [HomeController::class, 'cars'])->name('cars');
Route::get('/electric', [HomeController::class, 'electric'])->name('electric');
Route::get('/shipping', [HomeController::class, 'shipping'])->name('shipping');

// صفحات النماذج
Route::get('/service/general', [HomeController::class, 'generalForm'])->name('general.form');
Route::get('/service/car',     [HomeController::class, 'carForm'])->name('car.form');
Route::get('/service/shipping',[HomeController::class, 'shippingForm'])->name('shipping.form');

// معالجة الطلبات
Route::post('/service/general', [ServiceRequestController::class, 'storeGeneral'])->name('service.general');
Route::post('/service/car',     [ServiceRequestController::class, 'storeCar'])->name('service.car');
Route::post('/service/shipping',[ServiceRequestController::class, 'storeShipping'])->name('service.shipping');

// لوحة التحكم – تتطلب مصادقة ويجب أن يكون المستخدم هو المشرف
Route::middleware(['auth'])->prefix('dashboard')->group(function(){
    // الصفحة الرئيسية للوحة التحكم
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // باقى صفحات لوحة التحكم تعرض فقط للمشرف (admin@assaf.com)
    Route::get('/cars', function(){
        $user = auth()->user();
        if (!$user || $user->email !== 'admin@assaf.com') {
            return redirect()->route('home');
        }
        return view('dashboard.cars');
    })->name('dashboard.cars');
    Route::get('/devices', function(){
        $user = auth()->user();
        if (!$user || $user->email !== 'admin@assaf.com') {
            return redirect()->route('home');
        }
        return view('dashboard.devices');
    })->name('dashboard.devices');
    Route::get('/shipments', function(){
        $user = auth()->user();
        if (!$user || $user->email !== 'admin@assaf.com') {
            return redirect()->route('home');
        }
        return view('dashboard.shipments');
    })->name('dashboard.shipments');
    Route::get('/requests', function(){
        $user = auth()->user();
        if (!$user || $user->email !== 'admin@assaf.com') {
            return redirect()->route('home');
        }
        return view('dashboard.requests');
    })->name('dashboard.requests');
});

// إعداد مسارات المصادقة (Laravel Breeze أو Fortify)
// إذا كنت تستخدم حزمة مثل Breeze فستُنشئ مسارات تسجيل الدخول/التسجيل تلقائياً.
// هنا نضيف تعريفاً بسيطاً لمسار تسجيل الدخول حتى لا يحدث خطأ فى القائمة.
// Auth routes for login, registration and logout.
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Google OAuth login
Route::get('/login/google', [GoogleController::class, 'redirect'])->name('login.google');
Route::get('/login/google/callback', [GoogleController::class, 'callback']);
