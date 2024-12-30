<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void
  {
    Schema::create("users", function (Blueprint $table) {
      $table->id("id");
      $table->uuid("uuid")->nullable()->index();
      $table->timestamps();
      $table->softDeletes();
      $table->bigInteger("created_by")->nullable()->unsigned()->index();
      $table->bigInteger("updated_by")->nullable()->unsigned()->index();
      $table->bigInteger("deleted_by")->nullable()->unsigned()->index();
      $table->string("name", 255)->nullable();
      $table->string("email", 255)->nullable();
      $table->timestamp("email_verified_at")->nullable();
      $table->string("password", 255)->nullable();
      $table->string("username", 255)->nullable();
      $table->boolean("is_active")->default(false);
      $table->string("remember_token", 255)->nullable();
    });
  }



  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};
