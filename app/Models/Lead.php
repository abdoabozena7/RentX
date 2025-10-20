<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Lead model captures general enquiries or contact forms submitted by users.
 *
 * Attributes:
 * - id (int, primary key)
 * - name (string)            Name of the lead.
 * - phone (string)           Phone number of the lead.
 * - email (string|null)      Optional email address.
 * - message (text|null)      Message or details from the lead.
 * - created_at/updated_at    Timestamps managed by Laravel.
 */
class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
    ];
}