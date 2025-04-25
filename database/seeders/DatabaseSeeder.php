<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    private function seedUsers()
    {
        $iker = User::create([
            'name' => 'Iker Buded Buded',
            'email' => 'iker@iker.cat',
            'password' => bcrypt('iker1234'),
            'data_naixement' => '2006-06-10',
            'sexe' => 'home',
            'color_cabell' => 'negre',
            'color_ulls' => 'marró',
            'imatge' => 'usuarisImatges/defaultHombre.webp'
        ]);

        $leti = User::create([
            'name' => 'Leticia Andreea',
            'email' => 'leti@leti.cat',
            'password' => bcrypt('leti1234'),
            'data_naixement' => '2007-08-04',
            'sexe' => 'dona',
            'color_cabell' => 'negre',
            'color_ulls' => 'marró',
            'imatge' => 'usuarisImatges/defaultMujer.webp'
        ]);
    }


    public function run(): void
    {

        self::seedUsers();
        // User::factory(10)->create();

        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
    }
}
