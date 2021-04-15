<?php

use App\Image;
use Hamcrest\Core\HasToString;
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
            $user->groups()->attach($this->array(rand(1, 3)));

            //imagen creada con un valor por defecto, definido en factory
            //aca ponemos una imagen de perfil con otro valor: 90X90
            $user->image()->save(factory(App\Image::class)->make([
                'url' => 'https://picsum.photos/90/90?' . generateRandomString()
            ]));


            //crea 4 categoriras y tags para post y videos
            factory(App\Category::class, 4)->create();
            factory(App\Tag::class, 12)->create();

            //crea 40 posts
            factory(App\Post::class, 40)->create()->each(function ($post) {
                //crea una imagen al crear el post
                //1024 x 1024 del factory image
                $post->image()->save(factory(App\Image::class)->make());

                //usamos el metodo array y pasamos rand 1 al maximo de tag creado (12)
                $post->tags()->attach($this->array(rand(1, 12)));

                //comentarios
                $number_comments = rand(1, 6);
                for ($i = 0; $i < $number_comments; $i++) {
                    #salvamos cada comentario que se genere
                    $post->comments()->save(factory(App\Comment::class)->make());
                }
            });

            //crea Videos
            factory(App\Video::class, 40)->create()->each(function ($video) {
                //crea una imagen al crear el video
                //1024 x 1024 del factory image
                $video->image()->save(factory(App\Image::class)->make());

                //usamos el metodo array y pasamos rand 1 al maximo de tag creado (12)
                $video->tags()->attach($this->array(rand(1, 12)));

                //comentarios
                $number_comments = rand(1, 6);
                for ($i = 0; $i < $number_comments; $i++) {
                    #salvamos cada comentario que se genere
                    $video->comments()->save(factory(App\Comment::class)->make());
                }
            });
        });
    }

    public function array($max)
    {
        //recibimos max 3 valores, 1,2 o 3
        $values = [];
        for ($i = 1; $i < $max; $i++) {
            $values[] = $i;
        }
        return $values;
    }
}
