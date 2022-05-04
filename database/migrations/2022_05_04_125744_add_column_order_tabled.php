<?php

use App\Models\Order;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnOrderTabled extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::table('orders', static function (Blueprint $table) {
      $table->string('payment_method')
        ->default(Order::PAYMENT_METHOD_IN_SHOP)
        ->after('sale');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::table('orders', static function (Blueprint $table) {
      $table->dropColumn(['payment_method']);
    });
  }
}
