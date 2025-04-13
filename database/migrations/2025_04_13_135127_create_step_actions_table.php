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

        Schema::create('step_actions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lab_step_id');
            $table->foreign('lab_step_id')->references('id')->on('lab_steps');
            $table->bigInteger('lab_action_id');
            $table->foreign('lab_action_id')->references('id')->on('lab_actions');
            $table->integer('duration_seconds')->nullable();
            $table->decimal('temperature_celsius')->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('step_actions');
    }
};
