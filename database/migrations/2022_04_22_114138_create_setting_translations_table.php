<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTranslationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('setting_translations', static function (Blueprint $table) {
      $table->id();
      $table->foreignId('setting_id')
        ->constrained('settings')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->string('locale')->index();

      $table->text('value')->nullable();
      $table->unique(['setting_id', 'locale']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::dropIfExists('setting_translations');
  }
}
