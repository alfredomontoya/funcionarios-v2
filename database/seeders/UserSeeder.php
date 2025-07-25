<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Consulta', 'email' => 'test@example.com', 'password' => bcrypt('123'), 'email_verified_at'=> now()]);
         User::create(['name' => 'Consulta', 'email' => 'consulta', 'password' => bcrypt('123'), 'email_verified_at'=> now()]);
        //
        User::create(['name' => 'Cristian Pizarroso', 'email' => 'cpizarroso', 'password' => bcrypt('6331396'), 'email_verified_at'=> now(), 'role'=>'admin']);

        User::create(['name' => 'Katia Vaca', 'email' => 'kvaca.com', 'password' => bcrypt('4566188'), 'email_verified_at'=> now()]);
        User::create(['name' => 'Alexander Huertas', 'email' => 'ahuertas', 'password' => bcrypt('6325313'), 'email_verified_at'=> now()]);
        User::create(['name' => 'Lino Escobar Vaca', 'email' => 'lescobar', 'password' => bcrypt('3292099'), 'email_verified_at'=> now()]);
        User::create(['name' => 'Robin Suarez', 'email' => 'rsuarez', 'password' => bcrypt('3895919'), 'email_verified_at'=> now()]);
        User::create(['name' => 'Gabriela Antelo', 'email' => 'gantelo', 'password' => bcrypt('6319667'), 'email_verified_at'=> now()]);
        User::create(['name' => 'Juana Peinado', 'email' => 'jpeinado', 'password' => bcrypt('3856718'), 'email_verified_at'=> now()]);
        User::create(['name' => 'Pura Gabriela Jordan', 'email' => 'pjordan', 'password' => bcrypt('7695364'), 'email_verified_at'=> now()]);
        User::create(['name' => 'Oswaldo Marquez', 'email' => 'omarquez', 'password' => bcrypt('3937458'), 'email_verified_at'=> now()]);
        User::create(['name' => 'Emilio Sanchez', 'email' => 'eanchez', 'password' => bcrypt('2928141'), 'email_verified_at'=> now()]);

        User::create(['name' => 'Ani Eddy Vaca', 'email' => 'avaca', 'password' => bcrypt('4692384'), 'email_verified_at'=> now()]);
        User::create(['name' => 'Joana Aldunate', 'email' => 'jaldunate', 'password' => bcrypt('6278440'), 'email_verified_at'=> now()]);
        User::create(['name' => 'Mireysa Iturry Arias', 'email' => 'miturry', 'password' => bcrypt('3547384'), 'email_verified_at'=> now()]);
        User::create(['name' => 'Jaqueline Singuri', 'email' => 'jsinguri', 'password' => bcrypt('3928784'), 'email_verified_at'=> now()]);
        User::create(['name' => 'Alfredo Montoya', 'email' => 'amontoya', 'password' => bcrypt('4725253'), 'email_verified_at'=> now(), 'role' => 'admin']);
        User::create(['name' => 'Rolando Rojas Peña', 'email' => 'rrojas', 'password' => bcrypt('2837991'), 'email_verified_at'=> now()]);
        User::create(['name' => 'Carlos Andres Garcia Gonzales', 'email' => 'cgarcia', 'password' => bcrypt('4305161'), 'email_verified_at'=> now()]);
        User::create(['name' => 'José Santiago Uslar Saavedra', 'email' => 'juslar', 'password' => bcrypt('3189387'), 'email_verified_at'=> now()]);

        User::create(['name' => 'Comite Electoral 2023', 'email' => 'comite', 'password' => bcrypt('electoral'), 'email_verified_at'=> now()]);




        //User::factory()->count(10)->create();
    }
}
