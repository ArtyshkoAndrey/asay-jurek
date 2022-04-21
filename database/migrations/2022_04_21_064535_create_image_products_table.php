<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageProductsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('image_products', static function (Blueprint $table) {
      $table->id();
      $table->string('owner_name')->nullable();
      $table->string('local_name')->unique();
      $table->integer('bites')->default(0);
      $table->string('alt')->nullable();
      $table->foreignId('product_id')
        ->nullable()
        ->constrained('products')
        ->nullOnDelete()
        ->cascadeOnUpdate();

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::dropIfExists('image_products');
  }
}
