<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * يمثل عملية شحن أو طلب تخليص جمركى.
 * الحقول:
 *  - type: نوع الشحن (برّى، بحرى، جوّى).
 *  - description: وصف الطلب.
 *  - status: حالة الطلب (جديد، جارى التنفيذ، مكتمل، ملغى).
 *  - reference: رقم أو رمز مرجعى لتعقب الشحنة.
 */
class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'description',
        'status',
        'reference',
    ];
}