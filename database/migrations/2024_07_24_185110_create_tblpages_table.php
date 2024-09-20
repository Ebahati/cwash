<?php
    // database/migrations/xxxx_xx_xx_create_tblpages_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblpagesTable extends Migration
{
    public function up()
    {
        Schema::create('tblpages', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique();
            $table->text('detail');
            $table->string('openignHrs');
            $table->string('phoneNumber');
            $table->string('emailId');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tblpages');
    }
}


