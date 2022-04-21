<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTranslationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('status_translations', static function (Blueprint $table) {
      $table->id();
      $table->foreignId('status_id')
        ->constrained('statuses')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->string('locale')->index();

      $table->string('name');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::dropIfExists('status_translations');
  }
}
