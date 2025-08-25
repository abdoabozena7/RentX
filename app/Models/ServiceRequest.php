<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * يمثل طلب خدمة مقدم من الزبون عبر النماذج المختلفة.
 * الحقول:
 *  - request_type: نوع الطلب (general, car, shipping).
 *  - name: اسم العميل.
 *  - phone_code: كود الدولة (مثل +963).
 *  - phone: رقم الهاتف.
 *  - country: البلد (syria, turkey).
 *  - car_type: نوع السيارة إذا كان الطلب car.
 *  - shipping_type: نوع الشحن إذا كان الطلب shipping.
 *  - details: وصف إضافى.
 */
class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_type',
        'name',
        'phone_code',
        'phone',
        'country',
        'car_type',
        'shipping_type',
        'details',
    ];
}