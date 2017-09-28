<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('default_payment_processor_id')->unsigned();
            $table->foreign('default_payment_processor_id')->references('id')->on('payment_gateways')->onDelete('cascade');

            $table->string('site_title');
            $table->integer('currency_code');
            $table->string('google_analytics_code');

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
        Schema::drop('site_settings');
    }
}
