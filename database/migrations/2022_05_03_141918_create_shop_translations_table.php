<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopTranslationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('shop_translations', static function (Blueprint $table) {
      $table->id();
      $table->foreignId('shop_id')
        ->constrained('shops')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->string('locale')->index();

      $table->text('street');
      $table->string('time')->nullable();
      $table->unique(['shop_id', 'locale']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::dropIfExists('shop_translations');
  }
}
