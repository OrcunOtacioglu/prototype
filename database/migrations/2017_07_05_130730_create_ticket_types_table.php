<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_types', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('account_id')->unsigned();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->string('name');
            $table->string('description');
            $table->decimal('price');
            $table->integer('max_allowed_per_purchase');
            $table->integer('min_allowed_per_purchase');
            $table->integer('quantity_available');
            $table->integer('quantity_sold');
            $table->dateTime('sales_start_date');
            $table->dateTime('sales_end_date');
            $table->boolean('is_paused');
            $table->boolean('absorb_fees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_types');
    }
}
