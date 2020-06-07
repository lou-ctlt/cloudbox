<?php

use Illuminate\Database\Seeder;

class BoxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boxes')->insert([ // Ajout d'un seed
           [
               "user_id" => 1,
                "name" => "Fiches de paie",
                "description" => "Fiches de paie numérisées du 03-12 au 03-19",
                "nb_files" => 10
            ],
            [
                "user_id" => 2,
                "name" => "Photos Vacances",
                "description" => "Photos de notre séjour de Juin 2017",
                "nb_files" => 10
            ],
            [
                "user_id" => 1,
                "name" => "Recettes de cuisine",
                "description" => "Recettes vegan testées et approuvées",
                "nb_files" => 10
            ],
        ]);
    }
}
