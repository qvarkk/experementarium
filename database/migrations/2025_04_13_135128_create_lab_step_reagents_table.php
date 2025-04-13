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

        Schema::create('lab_step_reagents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('step_action_id');
            $table->foreign('step_action_id')->references('id')->on('step_actions');
            $table->bigInteger('reagent_id');
            $table->foreign('reagent_id')->references('id')->on('reagents');
            $table->decimal('quantity');
            $table->string('unit');
            $table->bigInteger('source_equipment_id')->nullable();
            $table->foreign('source_equipment_id')->references('id')->on('equipment');
            $table->bigInteger('destination_equipment_id')->nullable();
            $table->foreign('destination_equipment_id')->references('id')->on('equipment');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_step_reagents');
    }
};
