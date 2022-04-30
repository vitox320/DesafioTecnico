<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perfil::factory()->count(5)->create();
    }
}
