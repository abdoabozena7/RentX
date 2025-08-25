<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Bootstrap the application with some dummy data.
 *
 * This seeder invokes a handful of other seeders to populate
 * the database with a few cars, devices, shipments and an admin user.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CarSeeder::class,
            DeviceSeeder::class,
            ShipmentSeeder::class,
        ]);
    }
}