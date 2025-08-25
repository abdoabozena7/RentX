<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

/**
 * Seed the cars table with a few sample cars.
 */
class CarSeeder extends Seeder
{
    public function run(): void
    {
        $cars = [
            [
                'name' => 'تويوتا فورتشنر',
                'model' => '2021',
                'price_per_day' => 120.0,
                'details' => 'سيارة دفع رباعى مريحة ومناسبة للعائلات.',
                'image_path' => null,
            ],
            [
                'name' => 'هيونداى فيرنا',
                'model' => '2018',
                'price_per_day' => 80.0,
                'details' => 'سيارة اقتصادية صغيرة الحجم.',
                'image_path' => null,
            ],
            [
                'name' => 'مرسيدس E200',
                'model' => '2020',
                'price_per_day' => 200.0,
                'details' => 'سيارة فاخرة لمحبي الراحة والفخامة.',
                'image_path' => null,
            ],
        ];
        foreach ($cars as $data) {
            Car::create($data);
        }
    }
}