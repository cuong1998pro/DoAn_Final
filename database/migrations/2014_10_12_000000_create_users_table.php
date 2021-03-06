<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique();
      $table->string('password')->nullable();
      $table->text('anhdaidien');
      $table->unsignedBigInteger('role_id');
      $table
        ->foreign('role_id')
        ->references('id')
        ->on('roles');
      $table->string('trangthai');
      $table->string('provider')->nullable();
      $table->string('provider_id')->nullable();
      $table->rememberToken();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}