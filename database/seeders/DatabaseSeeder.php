<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
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

        $this->call(RolesTableSeeder::class);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role_id' => '1',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role_id' => '2',
        ]);

        Category::create([
            'name'=>'Jewelry',
            'description'=>'test....'
        ]);

        Product::create([
            'name'=>'Earrings',
            'description'=>'test',
            'price'=>'250',
            'category'=>'Jewelry',
            'image'=>'645e5bdda09fb93a4f6f1f06-sadnyy-2-pcs-aesthetic-canvas-tote-bags.jpg',
        ]);
        Product::create([
            'name'=>'Necklace',
            'description'=>'test',
            'price'=>'2500',
            'category'=>'Jewelry',
            'image'=>'645e5bdda09fb93a4f6f1f06-sadnyy-2-pcs-aesthetic-canvas-tote-bags.jpg',
        ]);
    }
}
