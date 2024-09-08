<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environmental_data', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing BIGINT column named 'id'
            $table->float('NH3', 8, 2); // FLOAT8 in PostgreSQL, 8 digits in total and 2 decimal places
            $table->float('NO2', 8, 2);
            $table->float('CO', 8, 2);
            $table->float('PM2_5', 8, 2);
            $table->float('Temp', 8, 2)->nullable(); // Allow NULL values
            $table->float('Pressure', 8, 2)->nullable();
            $table->float('Humidity', 8, 2)->nullable();
            $table->float('O3', 8, 2);
            $table->timestamp('Date'); // TIMESTAMP in PostgreSQL
            $table->timestamps(); // Adds `created_at` and `updated_at` columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('environmental_data');
    }
}
