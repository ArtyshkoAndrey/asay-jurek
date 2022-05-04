<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnOrderTabled extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::table('orders', static function (Blueprint $table) {
      $table->text('user_address')->nullable(true)->change();
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
      $table->text('user_address')->nullable(false)->change();
    });
  }
}
