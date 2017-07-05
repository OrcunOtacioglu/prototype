<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('ticket_type_id')->unsigned();
            $table->foreign('ticket_type_id')->references('id')->on('ticket_types')->onDelete('cascade');

            $table->integer('attendee_id')->unsigned();
            $table->foreign('attendee_id')->references('id')->on('attendees')->onDelete('cascade');

            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
