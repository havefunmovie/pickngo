<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(AgentUserSeeder::class);
        $this->call(DriverUserSeeder::class);
        $this->call(PickupDeliveryPriceSeeder::class);
        $this->call(AdminAgentServiceDataSeeder::class);
        User::factory()->count(200)->create();
    }
}
