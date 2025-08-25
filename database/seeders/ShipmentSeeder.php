<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shipment;

/**
 * Seed the shipments table with a few sample shipments.
 */
class ShipmentSeeder extends Seeder
{
    public function run(): void
    {
        $shipments = [
            [
                'type' => 'بحرى',
                'description' => 'شحنة حاوية من ميناء طرطوس إلى ميناء جدة.',
                'status' => 'جديد',
                'reference' => 'SHIP-001',
            ],
            [
                'type' => 'جوّى',
                'description' => 'شحنة طرود صغيرة عبر الخطوط الجوية.',
                'status' => 'جارى التنفيذ',
                'reference' => 'SHIP-002',
            ],
            [
                'type' => 'برّى',
                'description' => 'نقل مواد غذائية بين دمشق وحلب.',
                'status' => 'مكتمل',
                'reference' => 'SHIP-003',
            ],
        ];
        foreach ($shipments as $data) {
            Shipment::create($data);
        }
    }
}