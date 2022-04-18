<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyTranslationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('currency_translations', static function (Blueprint $table) {
      $table->id();
      $table->foreignId('currency_id')->constrained('currencies')->cascadeOnDelete()->cascadeOnUpdate();
      $table->string('locale')->index();

      $table->string('name');

      $table->unique(['currency_id', 'locale']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::dropIfExists('currency_translations');
  }
}
