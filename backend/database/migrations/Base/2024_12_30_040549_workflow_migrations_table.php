<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modul_id');
            $table->decimal('amount', 15, 2);
            $table->string('createdBy');
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger("created_by")->nullable()->unsigned()->index();
            $table->bigInteger("updated_by")->nullable()->unsigned()->index();
            $table->bigInteger("deleted_by")->nullable()->unsigned()->index();
        });

        Schema::create('workflow_approvals', function (Blueprint $table) {
            $table->id();
            $table->string('modul');
            $table->string('type');
            $table->decimal('value', 15, 2)->nullable();
            $table->string('nik')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('position')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger("created_by")->nullable()->unsigned()->index();
            $table->bigInteger("updated_by")->nullable()->unsigned()->index();
            $table->bigInteger("deleted_by")->nullable()->unsigned()->index();
        });

        Schema::create('need_approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modul_id');
            $table->unsignedBigInteger('transaction_id');
            $table->string('nik');
            $table->string('name');
            $table->string('email');
            $table->string('position');
            $table->integer('level');
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger("created_by")->nullable()->unsigned()->index();
            $table->bigInteger("updated_by")->nullable()->unsigned()->index();
            $table->bigInteger("deleted_by")->nullable()->unsigned()->index();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->string('nik')->primary();
            $table->string('name');
            $table->string('email');
            $table->string('position');
            $table->string('approver1_name')->nullable();
            $table->string('approver1_email')->nullable();
            $table->string('approver1_position')->nullable();
            $table->string('approver2_name')->nullable();
            $table->string('approver2_email')->nullable();
            $table->string('approver2_position')->nullable();
            $table->timestamps();
            $table->bigInteger("user_id")->nullable()->unsigned()->index();
            $table->softDeletes();
            $table->bigInteger("created_by")->nullable()->unsigned()->index();
            $table->bigInteger("updated_by")->nullable()->unsigned()->index();
            $table->bigInteger("deleted_by")->nullable()->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('workflow_approvals');
        Schema::dropIfExists('need_approvals');
        Schema::dropIfExists('employees');
    }
};
