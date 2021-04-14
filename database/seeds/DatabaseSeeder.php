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

        factory(App\Group::class,3)->create();

        factory(App\Level::class)->create(['name'=>'Oro']);
        factory(App\Level::class)->create(['name'=>'Plata']);
        factory(App\Level::class)->create(['name'=>'Bronce']);
    }
}
