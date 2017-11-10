<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Marca::class,50)->create();
        factory(App\Acabado::class,50)->create();
        factory(App\Calidad::class,50)->create();
        factory(App\Familia::class,50)->create();
        factory(App\Presentacion::class,50)->create();
        factory(App\Subtipo::class,50)->create();
        factory(App\Tipo::class,50)->create();
        factory(App\Unidad::class,50)->create();
    }
}
