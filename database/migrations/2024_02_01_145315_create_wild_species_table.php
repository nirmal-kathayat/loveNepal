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
        Schema::create('wild_species', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('wildlifetype_id');
            $table->string('image');
            $table->text('overview')->nullable();
            $table->text('physical_characteristics')->nullable();
            $table->text('conservation_status')->nullable();
            $table->text('significance_protection')->nullable();
            $table->timestamps();
            $table->foreign('wildlifetype_id')->references('id')->on('wildlife_lists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wild_species');
    }
};
