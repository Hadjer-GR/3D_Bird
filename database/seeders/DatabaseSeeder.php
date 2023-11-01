<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categorie;
use App\Models\product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user=User::factory()->create([
            'email'=>"hadjerghrab00@gmail.com",
            'password'=>'12345'
        ]);
        Categorie::factory(3)->create([
            'name'=>'architecture',
        ])->each(function($categorie) use($user){
            Product::factory(1)->create([
                'cat_id'=>$categorie->id,
                'user_id'=>$user->id
            ]);
        });
    }
}
