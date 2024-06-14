<?php

// database/migrations/xxxx_xx_xx_create_wells_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWellsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wells', function (Blueprint $table) {
            $table->id('well_id');
            $table->foreignId('company_id')->constrained('companies', 'company_id')->onDelete('cascade');
            $table->string('well_name');
            $table->string('well_location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wells');
    }
};
