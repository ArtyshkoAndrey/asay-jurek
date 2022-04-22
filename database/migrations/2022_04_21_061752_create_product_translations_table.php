<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTranslationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('product_translations', static function (Blueprint $table) {
      $table->id();
      $table->foreignId('product_id')
        ->constrained('products')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->string('locale')->index();

      $table->string('name');
      $table->longText('description')->nullable();
      $table->longText('history')->nullable();
      $table->unique(['product_id', 'locale']);
    });

    Schema::table('products', static function (Blueprint $table) {
      $table->dropColumn(['description', 'history']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::dropIfExists('product_translations');

    Schema::table('products', static function (Blueprint $table) {
      $table->longText('history')->nullable()->after('cost');
      $table->longText('description')->nullable()->after('cost');
    });
  }
}
