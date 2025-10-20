<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Reservation model stores booking information for cars.
 *
 * Attributes:
 * - id (int, primary key)
 * - car_id (int)            Foreign key referencing cars.id
 * - customer_name (string)   Full name of the customer.
 * - phone (string)           Phone number of the customer.
 * - national_id (string)     Passport or national ID number.
 * - start_date (date)        Start date of the reservation.
 * - end_date (date)          End date of the reservation.
 * - status (string)          Reservation status: جاري، مكتمل، ملغي.
 * - created_at/updated_at    Timestamps managed by Laravel.
 */
class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'customer_name',
        'phone',
        'national_id',
        'start_date',
        'end_date',
        'status',
    ];

    /**
     * Get the associated car for this reservation.
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}