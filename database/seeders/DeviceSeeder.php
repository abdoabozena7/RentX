<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Device;

/**
 * Seed the devices table with some sample electrical devices.
 */
class DeviceSeeder extends Seeder
{
    public function run(): void
    {
        $devices = [
            [
                'title' => 'مكيف صحراوى سبرينغر',
                'description' => 'مكيف صحراوى بقدرة تبريد 12 ألف وحدة حرارية.',
                'price' => 350.0,
                'image_path' => null,
            ],
            [
                'title' => 'غسالة أوتوماتيك سامسونج',
                'description' => 'غسالة بسعة 8 كيلو مع ميزات توفير الطاقة.',
                'price' => 450.0,
                'image_path' => null,
            ],
            [
                'title' => 'تلفاز ذكى 55 بوصة',
                'description' => 'تلفاز بدقة UHD مع تطبيقات ذكية مدمجة.',
                'price' => 600.0,
                'image_path' => null,
            ],
        ];
        foreach ($devices as $data) {
            Device::create($data);
        }
    }
}