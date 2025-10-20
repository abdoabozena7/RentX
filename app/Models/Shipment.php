<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Shipment model tracks import/export or customs shipments.
 *
 * Attributes:
 * - id (int, primary key)
 * - type (string)            e.g. استيراد، تصدير، تخليص جمركي.
 * - ref (string)             External reference code.
 * - status (string)          Current status of the shipment.
 * - eta (date|null)          Estimated date of arrival/completion.
 * - description (text|null)  Additional details.
 * - created_at/updated_at    Timestamps managed by Laravel.
 */
class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'ref',
        'status',
        'eta',
        'description',
    ];
}