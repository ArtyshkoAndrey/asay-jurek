<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('products', static function (Blueprint $table) {
      $table->id();
      $table->foreignId('category_id')
        ->nullable()
        ->constrained('categories')
        ->cascadeOnUpdate()
        ->nullOnDelete();

      $table->integer('count')->default(0);
      $table->integer('cost')->default(0);
      $table->longText('description')->nullable();
      $table->longText('history')->nullable();
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
    Schema::dropIfExists('products');
  }
}
