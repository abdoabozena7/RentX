<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * يمثل جهاز كهربائى (منتج) معروض للبيع.
 * الحقول:
 *  - title: اسم الجهاز.
 *  - description: وصف مختصر.
 *  - price: السعر بالدولار أو العملة المحلية.
 *  - image_path: مسار الصورة التخزينية.
 */
class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image_path',
    ];
}