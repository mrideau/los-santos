<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Place;
use App\Models\User;
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
    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);

    User::factory()->create([
      'name' => 'Test User',
      'email' => 'test@example.com',
      'password' => bcrypt('pswd')
    ]);

    Place::factory()->create([
      'slug' => 'diamond-casino',
      'name' => 'Diamond Casino',
      'latitude' => 49.69,
      'longitude' => 938.70,
      'image_path' => 'places/casino.jpg'
    ]);

    Place::factory()->create([
      'slug' => 'pier',
      'name' => 'Pier',
      'latitude' => -1105.79,
      'longitude' => -1684.06,
      'image_path' => 'places/pier.jpg'
    ]);

    Place::factory()->create([
      'slug' => 'observatory',
      'name' => 'Observatory',
      'latitude' => 1107.62,
      'longitude' => -427.72,
      'image_path' => 'places/observatory.png'
    ]);

    Place::factory()->create([
      'slug' => 'vinewood',
      'name' => 'Vinewood',
      'latitude' => 1081.70,
      'longitude' => 917.59,
      'image_path' => 'places/vinewood.jpg'
    ]);
  }
}
