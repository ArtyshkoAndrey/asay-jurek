<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

      if (!Seo::whereUrl('/')->exists()) {
        $seo = new Seo([
          'url' => '/',
          'title' => 'Главная страница магазина Asay Jurek',
          'description' => 'Главная страница',
          'meta_description' => 'Купить брендовую одежду в Казахстане',
          'meta_keywords' => 'Asay Jurek, интернет магазин'
        ]);
        $seo->save();
      }
    }
}
