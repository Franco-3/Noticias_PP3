<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Noticia;
use App\Models\User;
use Faker;

class NoticiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        $n = new Noticia();
        $n->titulo = 'Título de prueba';
        $n->cuerpo = 'Cuerpo de prueba';
        $n->autor = User::all()->random()->id;
        $n->save();

        $n = Noticia::first();
        $n->titulo = "Título de prueba modificado";
        $n->save();

        $n = Noticia::firstOrNew(['titulo' => 'Título de prueba modificado']);
        $n->titulo = "Título de prueba modificado nuevamente";
        $n->save();

        $n = Noticia::firstOrNew(['titulo' => 'Título de prueba modificado']);
        $n->cuerpo = "Como es nuevo, hay que asignar los valores not null";
        $n->autor = User::all()->random()->id;
        $n->save();

        $n = Noticia::find(2);
        $n->delete();
        $n = Noticia::destroy(1);

        for ($i=1; $i < 20; $i++) { 
            $faker = Faker\Factory::create();
            $n = new Noticia();
            $n->titulo = "Noticia $i";
            $n->cuerpo = file_get_contents('http://loripsum.net/api');
            $n->autor = User::all()->random()->id;
            $n->imagen = $faker->optional()->imageUrl(150,150);
            $n->save();
        }
        */

        Noticia::factory(30)->create();

    }
}
