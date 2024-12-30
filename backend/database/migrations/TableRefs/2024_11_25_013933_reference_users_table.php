<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void
  {
    Schema::table("users", function (Blueprint $table) {
      $table->foreign("created_by")
        ->references("id")
        ->on("users");
      $table->foreign("updated_by")
        ->references("id")
        ->on("users");
      $table->foreign("deleted_by")
        ->references("id")
        ->on("users");
    });
  }



  public function down(): void
  {
    Schema::table("users", function (Blueprint $table) {
      $table->dropForeign(["created_by"]);
      $table->dropForeign(["updated_by"]);
      $table->dropForeign(["deleted_by"]);
    });
  }
};
