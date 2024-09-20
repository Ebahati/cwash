<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblcarwashbookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcarwashbooking', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID column
            $table->string('bookingId'); // Booking ID column
            $table->string('packageType'); // Package type column
            $table->unsignedBigInteger('carWashPoint'); // Car wash point column
            $table->string('fullName'); // Full name column
            $table->string('mobileNumber'); // Mobile number column
            $table->date('washDate'); // Wash date column
            $table->time('washTime'); // Wash time column
            $table->text('message')->nullable(); // Message column, nullable
            $table->string('status'); // Status column
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblcarwashbooking');
    }
}
