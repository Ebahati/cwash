<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('FullName');
            $table->string('EmailId');
            $table->string('Subject');
            $table->text('Description');
            $table->timestamp('PostingDate')->useCurrent();
            $table->tinyInteger('Status')->default(0); // 0 for unread, 1 for read
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enquiries');
    }
}
