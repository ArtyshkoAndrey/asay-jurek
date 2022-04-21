<?php

use App\Models\Currency;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInCurrenciesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::table('currencies', static function (Blueprint $table) {
      $table->string('symbol')->nullable()->after('short_name');
    });

    \App\Models\Currency::each(static function (Currency $c) {
      if ($c->short_name === 'KZT') {
        $c->symbol = '₸';
      } else if ($c->short_name === 'RUB') {
        $c->symbol = '₽';
      } if ($c->short_name === 'USD') {
        $c->symbol = '$';
      }
      $c->save();
    });

    Schema::table('currencies', static function (Blueprint $table) {
      $table->string('symbol')->nullable(false)->after('short_name')->change();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::table('currencies', static function (Blueprint $table) {
      $table->dropColumn(['symbol']);
    });
  }
}
