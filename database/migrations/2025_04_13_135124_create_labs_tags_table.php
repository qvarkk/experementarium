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

        Schema::create('labs_tags', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lab_id');
            $table->foreign('lab_id')->references('id')->on('labs');
            $table->bigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labs_tags');
    }
};
