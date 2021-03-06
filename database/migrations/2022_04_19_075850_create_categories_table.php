<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('categories', static function (Blueprint $table) {
      $table->id();
      $table->timestamps();
    });

    Schema::table('categories', static function (Blueprint $table) {
      $table->foreignId('parent_id')
        ->nullable()
        ->after('id')
        ->constrained('categories')
        ->cascadeOnDelete()
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
    Schema::dropIfExists('categories');
  }
}
