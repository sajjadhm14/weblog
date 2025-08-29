<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\Sampel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SampelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sampel::factory()->count(10)->create();

    }
}
