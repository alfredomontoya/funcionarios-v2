<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use App\Models\Gestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gestion::factory(2)->create();
        Funcionario::factory(100)->create();

    }
}
