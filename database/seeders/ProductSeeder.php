<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(): void
  {
    if (Status::count() === 0) {
      $status = new Status([
        'ru' => [
          'name' => 'Отличное'
        ],
        'en' => [
          'name' => 'Good'
        ],
      ]);
      $status->save();
    } else {
      $status = Status::first();
    }

    if (Category::count() === 0) {
      $category = new Category([
        'ru' => [
          'name' => 'Верхняя одежда'
        ],
        'en' => [
          'name' => 'Outerwear'
        ],
      ]);
      $category->save();
    } else {
      $category = Category::first();
    }

    $product = new Product([
      'cost' => 200000,
      'count' => 10,

      'ru' => [
        'name' => 'Винтажный черный тренч',
        'description' => 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.',
        'history' => null
      ],
      'en' => [
        'name' => 'Vintage Black Trench Coat',
        'description' => 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.',
        'history' => null
      ]
    ]);

    $product->save();
    $product->category()->associate($category);
    $product->status()->associate($status);
    $product->save();
  }
}
