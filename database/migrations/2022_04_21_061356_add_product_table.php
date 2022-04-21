<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::table('products', static function (Blueprint $table) {
      $table->foreignId('status_id')
        ->nullable()
        ->after('category_id')
        ->constrained('statuses')
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
    Schema::table('products', static function (Blueprint $table) {
      $table->dropColumn(['status_id']);
    });
  }
}
