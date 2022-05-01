<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewProductTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::table('products', static function (Blueprint $table) {
      $table->boolean('new')->after('cost')->default(false);
      $table->boolean('week')->after('new')->default(false);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::table('products', static function (Blueprint $table) {
      $table->dropColumn(['new', 'week']);
    });
  }
}
