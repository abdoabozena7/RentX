<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * AcLead model represents leads specifically for desert cooler (AC) enquiries.
 *
 * Attributes:
 * - id (int, primary key)
 * - name (string)            Name of the prospective buyer.
 * - phone (string)           Contact number.
 * - city (string|null)       City of the buyer.
 * - capacity (string|null)   Desired capacity (e.g. litres/hour).
 * - use_case (text|null)     Intended use (e.g. home, warehouse, farm…).
 * - created_at/updated_at    Timestamps managed by Laravel.
 */
class AcLead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'city',
        'capacity',
        'use_case',
    ];
}