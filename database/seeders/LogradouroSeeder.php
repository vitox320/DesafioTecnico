<?php

namespace Database\Seeders;

use App\Models\Logradouro;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogradouroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Logradouro::factory()->count(20)->create();
    }
}
