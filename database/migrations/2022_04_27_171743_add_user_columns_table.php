<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserColumnsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::table('users', static function (Blueprint $table) {
      $table->text('photo')->nullable();
      $table->string('phone')->nullable();
      $table->text('address')->nullable();
      $table->string('index')->nullable();
      $table->boolean('notify')->default(false);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::table('users', static function (Blueprint $table) {
      $table->dropColumn(['photo', 'phone', 'address', 'index', 'notify']);
    });
  }
}
