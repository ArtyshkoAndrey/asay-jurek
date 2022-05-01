<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('order_items', static function (Blueprint $table) {
      $table->id();
      $table->foreignId('order_id')
        ->constrained('orders')
        ->cascadeOnUpdate()
        ->cascadeOnDelete();
      $table->foreignId('product_id')
        ->constrained('products')
        ->cascadeOnUpdate()
        ->cascadeOnDelete();

      $table->integer('count');
      $table->integer('cost');
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
    Schema::dropIfExists('order_items');
  }
}
