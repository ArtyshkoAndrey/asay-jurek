<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('orders', static function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')
        ->nullable()
        ->constrained('users')
        ->nullOnDelete()
        ->cascadeOnUpdate();
      $table->string('user_name');
      $table->text('user_address');
      $table->text('user_phone');
      $table->integer('cost');
      $table->string('status');
      $table->string('type_delivery');
      $table->date('payment_at')->nullable();
      $table->string('promo_code')->nullable();
      $table->integer('sale')->default(0);
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
    Schema::dropIfExists('orders');
  }
}
