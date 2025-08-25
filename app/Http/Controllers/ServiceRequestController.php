<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/**
 * هذا المتحكم يتعامل مع حفظ الطلبات الواردة من نماذج الموقع.
 */
class ServiceRequestController extends Controller
{
    /**
     * تخزين طلب عام.
     */
    public function storeGeneral(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'phone_code' => 'required|string',
            'phone'      => 'required|string',
            'country'    => 'required|string',
            'details'    => 'nullable|string',
        ]);
        $data['request_type'] = 'general';
        ServiceRequest::create($data);
        return Redirect::back()->with('success', 'تم إرسال طلبك بنجاح!');
    }

    /**
     * تخزين طلب حجز سيارة.
     */
    public function storeCar(Request $request)
    {
        // إذا تم اختيار السيارة عن طريق المعرف، يصبح حقل car_type اختيارياً، 
        // ويتم استبداله باسم السيارة المختارة تلقائياً.
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'phone_code' => 'required|string',
            'phone'      => 'required|string',
            'country'    => 'required|string',
            'car_id'     => 'nullable|exists:cars,id',
            'car_type'   => 'required_without:car_id|string|nullable',
            'details'    => 'nullable|string',
        ]);
        // إذا تم تمرير car_id، اجلب اسم السيارة واستخدمه فى الحقل car_type لسهولة القراءة
        if (!empty($data['car_id'])) {
            $car = \App\Models\Car::find($data['car_id']);
            if ($car) {
                $data['car_type'] = $car->name;
            }
        }
        $data['request_type'] = 'car';
        ServiceRequest::create($data);
        return Redirect::back()->with('success', 'تم إرسال طلبك بنجاح!');
    }

    /**
     * تخزين طلب شحن.
     */
    public function storeShipping(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'phone_code'    => 'required|string',
            'phone'         => 'required|string',
            'country'       => 'required|string',
            'shipping_type' => 'required|string',
            'details'       => 'nullable|string',
        ]);
        $data['request_type'] = 'shipping';
        ServiceRequest::create($data);
        return Redirect::back()->with('success', 'تم إرسال طلبك بنجاح!');
    }
}