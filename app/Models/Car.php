<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * يمثل هذا النموذج سيارة متاحة للإيجار.
 * الحقول الأساسية:
 *  - name: اسم السيارة بالعربية أو الإنجليزية.
 *  - model: موديل أو سنة التصنيع.
 *  - price_per_day: تكلفة الإيجار لليوم الواحد.
 *  - details: وصف نصى للمواصفات.
 *  - image_path: مسار صورة السيارة فى مجلد التخزين/public.
 */
class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'price_per_day',
        'details',
        'image_path',
    ];
}