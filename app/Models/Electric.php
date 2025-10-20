<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Electric model represents an electrical appliance or product.
 *
 * Attributes:
 * - id (int, primary key)
 * - name (string)           Name of the product.
 * - description (text|null) Human‑friendly description of the item.
 * - price (float|null)      Price of the item in local currency.
 * - image_path (string|null)Path to the stored image on disk.
 * - created_at/updated_at    Timestamps managed by Laravel.
 */
class Electric extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_path',
    ];
}