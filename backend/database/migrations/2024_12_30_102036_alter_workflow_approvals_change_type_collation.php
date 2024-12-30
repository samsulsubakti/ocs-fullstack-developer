<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workflow_approvals', function (Blueprint $table) {
            // Modify the collation of the 'type' column
            DB::statement("ALTER TABLE `workflow_approvals` 
                MODIFY `type` VARCHAR(50) 
                CHARACTER SET utf8mb4 
                COLLATE utf8mb4_0900_ai_ci");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workflow_approvals', function (Blueprint $table) {
            // Revert the collation change (assuming the previous collation was utf8mb4_unicode_ci)
            DB::statement("ALTER TABLE `workflow_approvals` 
                MODIFY `type` VARCHAR(50) 
                CHARACTER SET utf8mb4 
                COLLATE utf8mb4_unicode_ci");
        });
    }
};
