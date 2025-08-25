<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * المتحكم المسؤول عن الصفحات الأمامية للموقع.
 * لا يحتوى على أى منطق معقد، بل يقوم فقط بعرض القوالب.
 */
class HomeController extends Controller
{
    /**
     * الصفحة الرئيسية.
     */
    public function index()
    {
        return view('front.home');
    }

    /**
     * صفحة قائمة السيارات.
     */
    public function cars()
    {
        return view('front.cars');
    }

    /**
     * صفحة المنتجات الكهربائية.
     */
    public function electric()
    {
        return view('front.electric');
    }

    /**
     * صفحة خدمات الشحن والجمارك.
     */
    public function shipping()
    {
        return view('front.shipping');
    }

    /**
     * نماذج الطلبات.
     */
    public function generalForm()
    {
        return view('front.forms.general-service');
    }

    public function carForm(Request $request)
    {
        // إذا تم تمرير معرف سيارة عبر الاستعلام، نجلب تفاصيل السيارة لتمريرها إلى النموذج.
        $car = null;
        if ($request->has('car')) {
            $carId = $request->input('car');
            // جلب السيارة إذا كانت موجودة
            $car = \App\Models\Car::find($carId);
        }
        return view('front.forms.car-service', [
            'car' => $car,
        ]);
    }

    public function shippingForm()
    {
        return view('front.forms.shipping-service');
    }
}