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
        Schema::create('parking_spaces', function (Blueprint $table) {
            $table->id();

            $table->string('stablishment_name');
            $table->string('stablishment_desciption');
            $table->bigInteger('parking_space_count')->default(0);
            $table->double('parking_price')->default(0.0);
            $table->string('parking_starting_name');
            // $table->double('parking_price')->default(0.0);
            // $table->boolean('per_hour');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_spaces');
    }
};
