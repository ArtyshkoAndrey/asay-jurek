<?php

namespace Database\Seeders;

use Str;
use File;
use Exception;
use App\Models\Status;
use App\Models\Product;
use App\Models\Category;
use App\Models\ImageProduct;
use Illuminate\Database\Seeder;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   * @throws FileNotFoundException
   * @throws Exception
   */
  public function run(): void
  {
    if (Status::count() === 0) {
      $status = new Status([
        'ru' => [
          'name' => 'Отличное',
        ],
        'en' => [
          'name' => 'Good',
        ],
      ]);
      $status->save();
    } else {
      $status = Status::first();
    }

    if (Category::count() === 0) {
      $category = new Category([
        'ru' => [
          'name' => 'Верхняя одежда',
        ],
        'en' => [
          'name' => 'Outerwear',
        ],
      ]);
      $category->save();
    } else {
      $category = Category::first();
    }

    $product = new Product([
      'cost' => random_int(100000, 900000),
      'count' => random_int(0, 3),
      'ru' => [
        'name' => 'Винтажный черный тренч',
        'description' => 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.',
        'history' => null,
      ],
      'en' => [
        'name' => 'Vintage Black Trench Coat',
        'description' => 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.',
        'history' => null,
      ],
    ]);
    $img = ImageProduct::first();
    $path = 'public/storage/img-products/' . $img->local_name;
    $type = File::extension($path);
    $name = Str::random(10) . '.' . $type;
    File::copy($path, 'public/storage/img-products/' . $name);
    $img = new ImageProduct([
      'local_name' => $name,
      'owner_name' => $name,
      'bites' => File::size('public/storage/img-products/' . $name),
      'alt' => $name,
    ]);
    $img->save();

    $product->save();
    $product->category()->associate($category);
    $product->status()->associate($status);
    $img->product()->associate($product);
    $img->save();
    $product->save();
  }
}
