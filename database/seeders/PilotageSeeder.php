<?php

namespace Database\Seeders;

use App\Models\Pilotage;
use Illuminate\Database\Seeder;

class PilotageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pilotage::create([
            'people'         => 20,
            'pricePerPerson' => 44,
            'priceMonthly'   => 880
        ]);
    }
}
