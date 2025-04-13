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
        Schema::disableForeignKeyConstraints();

        Schema::create('step_actions_equipment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('step_action_id');
            $table->foreign('step_action_id')->references('id')->on('step_actions');
            $table->bigInteger('equipment_id');
            $table->foreign('equipment_id')->references('id')->on('equipment');
            $table->string('role');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_step_equipment');
    }
};
