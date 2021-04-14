<?php

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
        // $this->call(UsersTableSeeder::class);
        //para faker, configurar los factory antes del seeder

        factory(App\Group::class, 3)->create();

        factory(App\Level::class)->create(['name' => 'Oro']);
        factory(App\Level::class)->create(['name' => 'Plata']);
        factory(App\Level::class)->create(['name' => 'Bronce']);

        //crea 5 usuarios
        factory(App\User::class, 5)->create()->each(function ($user) {
            //enviamos un array y no un registro creado
            //usa MAKE y no CREATE, por que asi se enlaza con el user, en cambio CREATE se crea por su lado y no se enlaza
            $profile = $user->profile()->save(factory(App\Profile::class)->make());

            //lo mismo, generamos un array para que se salve en la tabla de location
            $profile->location()->save(factory(App\Location::class)->make());

            //pasamos con attach un numero random para que se registre 1,2 o 3 grupos y no uno solo
            $user->groups()->attach($this->array(rand(1,3)));

            //imagen creada con un valor por defecto, definido en factory
            //aca ponemos una imagen de perfil con otro valor: 90X90
            $user->image()->save(factory(App\Image::class)->make([
                'url'=>'https://lorempixel.com/90/90/'
            ]));



        });
    }

    public function array($max){
        //recibimos max 3 valores, 1,2 o 3
        $values=[];
        for ($i=1; $i < $max; $i++) {
            $values[]=$i;
        }
        return $values;
    }
}
