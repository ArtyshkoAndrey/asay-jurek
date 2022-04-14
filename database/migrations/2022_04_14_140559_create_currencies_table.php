<?php

use App\Models\Currency;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('currencies', static function (Blueprint $table) {
      $table->id();
      $table->string('short_name')->unique();
      $table->string('name')->unique();
      $table->double('value', 10, 3)->default(1);
      $table->string('description')->nullable();
      $table->timestamps();
    });

    $currency = new Currency([
      'short_name' => 'KZT',
      'name'       => 'Казахстанский тенге',
      'value'      => 1,
    ]);
    $currency->save();
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::dropIfExists('currencies');
  }
}
