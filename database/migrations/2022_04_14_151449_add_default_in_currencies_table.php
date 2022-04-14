<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultInCurrenciesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::table('currencies', static function (Blueprint $table) {
      $table->boolean('default')->default(false)->after('name');
    });

    $currency = \App\Models\Currency::first();
    $currency->default = true;
    $currency->save();
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::table('currencies', static function (Blueprint $table) {
      $table->dropColumn(['default']);
    });
  }
}
