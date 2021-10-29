<?php

namespace Database\Seeders;

use App\Models\AgentService;
use Illuminate\Database\Seeder;

class AdminAgentServiceDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AgentService::create([
            'name' => 'admin',
            'access_key' => 'CD97722D88D5ECD5',
            'username' => 'TUPSS370',
            'password' => 'H7v2v2845',
            'account_number' => 'V3685E', 
            'agent_id' => '1', 
        ]);
    }
}
