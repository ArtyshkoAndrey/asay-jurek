<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('carts', static function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')
        ->constrained('users')
        ->cascadeOnUpdate()
        ->cascadeOnDelete();

      $table->foreignId('product_id')
        ->constrained('products')
        ->cascadeOnUpdate()
        ->cascadeOnDelete();

      $table->integer('count')->default(1);

      $table->unique(['user_id', 'product_id']);

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
    Schema::dropIfExists('carts');
  }
}
