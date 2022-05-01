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
      $table->text('photo')->nullable()->after('email');
      $table->string('phone')->nullable()->after('photo');
      $table->string('country')->nullable()->after('phone');
      $table->string('city')->nullable()->after('country');
      $table->text('street')->nullable()->after('city');
      $table->string('post_index')->nullable()->after('street');
      $table->boolean('notify')->default(false)->after('post_index');
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
      $table->dropColumn(['photo', 'phone', 'country', 'city', 'street', 'index', 'notify']);
    });
  }
}
