<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            'name'=>'user',
            'email'=>'user@gmail.com',
            'password'=>bcrypt(123456789)
        ]);

        Category::create([
            "name"=>"labtop",
            "desc"=> "In a quaint little town nestled between rolling hills
             and lush forests, there lies a charming bakery known for its
             delectable pastries and warm, inviting atmosphere. The smell of
             freshly baked bread and sweet treats wafts through the air, drawing in
             customers from near and far. The cozy interior is decorated with vintage
              accents and colorful floral arrangements, creating a cozy and welcoming ambiance.
               As you step inside, you are greeted with the sight of mouthwatering cakes, pies,
                and cookies displayed on rustic wooden shelves. The friendly bakers behind the counter wear flour-dusted
                aprons and cheerful smiles as they assist customers in selecting their favorite treats. It's a place where time seems to slow down,
                  and every bite is a taste of pure joy and comfort. "

        ]);


        $this->call([

        ]);

        // CateogySeeder::class
      }

}
