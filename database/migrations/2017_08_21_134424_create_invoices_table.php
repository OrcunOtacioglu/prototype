<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->integer('attendee_id')->unsigned();
            $table->foreign('attendee_id')->references('id')->on('attendees')->onDelete('cascade');

            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->string('reference');
            $table->integer('transaction_id');
            $table->boolean('is_cancelled');

            $table->string('customer_name');
            $table->text('address')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();

            $table->string('event_name');

            $table->decimal('net_price')->nullable();
            $table->decimal('tax')->nullable();
            $table->decimal('fee')->nullable();
            $table->decimal('total');
            $table->string('pdf_path')->nullable();

            $table->dateTime('generated_at');
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
        Schema::dropIfExists('invoices');
    }
}
