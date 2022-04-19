<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTranslationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('category_translations', static function (Blueprint $table) {
      $table->id();
      $table->foreignId('category_id')
        ->constrained('categories')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->string('locale')->index();

      $table->string('name');

      $table->unique(['category_id', 'locale']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::dropIfExists('category_translations');
  }
}
