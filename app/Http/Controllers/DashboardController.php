<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Device;
use App\Models\Shipment;
use App\Models\ServiceRequest;

/**
 * المتحكم المسؤول عن لوحة التحكم للمشرف. يتطلب تسجيل دخول.
 */
class DashboardController extends Controller
{
    public function index()
    {
        // تحقق من صلاحية المشرف: يسمح بالدخول فقط للبريد admin@assaf.com
        $user = auth()->user();
        if (!$user || $user->email !== 'admin@assaf.com') {
            return redirect()->route('home')->with('error', 'ليس لديك صلاحية الدخول إلى لوحة التحكم');
        }

        $stats = [
            'cars'      => Car::count(),
            'devices'   => Device::count(),
            'shipments' => Shipment::count(),
            'requests'  => ServiceRequest::count(),
        ];
        return view('dashboard.index', compact('stats'));
    }
}