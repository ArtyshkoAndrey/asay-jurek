<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsAdminUserTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up (): void
  {
    Schema::table('users', static function (Blueprint $table) {
      $table->boolean('is_admin')
        ->default(false)
        ->after('email');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down (): void
  {
    Schema::table('users', static function (Blueprint $table) {
      $table->dropColumn(['is_admin']);
    });
  }
}
