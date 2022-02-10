<?php

namespace Database\Seeders;

use App\Models\Installation;
use Illuminate\Database\Seeder;

class InstallationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Installation::create([ 'name' => 'Downloading Site Details', 'status' => 0 ]);
        Installation::create([ 'name' => 'Downloading awetobot Configurations', 'status' => 0 ]);
        Installation::create([ 'name' => 'Configuring awetobot', 'status' => 0 ]);
        Installation::create([ 'name' => 'Establishing Tunnel', 'status' => 0 ]);
        Installation::create([ 'name' => 'Verifying Configurations', 'status' => 0 ]);
        Installation::create([ 'name' => 'Finishing up installations', 'status' => 0 ]);
    }
}
