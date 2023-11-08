<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;
use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolAdmin= Rol::create(['nombre'=>'administrador']);
        $rolDocente = Rol::create(['nombre' => 'dde']);

        $administrador = User::create([
            'nombre' => 'Administrador',
            'user' => 'administrador@admin.com',
            'password' => bcrypt('dekumentor'),
            'rol_id' => $rolAdmin->id
        ]);
        $dde = User::create([
            'nombre' => 'Docente',
            'user' => 'docente@admin.com',
            'password' => bcrypt('dekumentor'),
            'rol_id' => $rolDocente->id
        ]);

        $this->command->info("Administrator User created with email {$administrador->user} and password dekumentor");
        $this->command->info("DDE User created with email {$dde->user} and password dekumentor");

    }
}
