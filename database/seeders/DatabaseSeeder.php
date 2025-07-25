<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->truncateTables([
            'user',
            'gestion',
            'funcionario',
            // 'edificio',
            // 'bitacora'
        ]);

        // MARCADO

        $this->call(UserSeeder::class);
        $this->call(FuncionarioSeeder::class);
        // $this->call(Funcionarios2023Seeder::class);

        // $this->call(FuncionarioSeeder1::class);
        // $this->call(FuncionarioSeeder2::class);
        // $this->call(FuncionarioSeeder2::class);
        // $this->call(FuncionarioSeeder3::class);
        // $this->call(FuncionarioSeeder4::class);
        // $this->call(FuncionarioSeeder5::class);
        // $this->call(BitacoraSeeder::class);

        // $this->call(EdificioSeeer::class);

        //$this->call(FotopersonaSeeder::class);
        //$this->call(DatosnaturalSeeder::class);
        //$this->call(DatosjuridicoSeeder::class);

    }

    protected function truncateTables(array $tables)
    {
        $connection = DB::getDriverName();

        if ($connection === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        } elseif ($connection === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = OFF;');
        }

        foreach ($tables as $table) {
            // Eliminar datos
            DB::table($table)->delete();

            // Reset autoincrement según el motor
            if ($connection === 'mysql') {
                DB::statement("ALTER TABLE `$table` AUTO_INCREMENT = 1");
            } elseif ($connection === 'sqlite') {
                DB::statement("DELETE FROM sqlite_sequence WHERE name = '$table'");
            }
        }

        if ($connection === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        } elseif ($connection === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = ON;');
        }
    }
}

