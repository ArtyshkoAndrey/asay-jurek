<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnShopOrderTabled extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::table('orders', static function (Blueprint $table) {
      $table->foreignId('shop_id')
        ->nullable()
        ->constrained('shops')
        ->nullOnDelete()
        ->cascadeOnUpdate();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::table('orders', static function (Blueprint $table) {
      $table->dropColumn(['shop_id']);
    });
  }
}
