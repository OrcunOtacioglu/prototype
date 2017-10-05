<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFeaturedImageParts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('featured_image')->nullable();
            $table->string('featured_title')->nullable();
            $table->string('small_image')->nullable();
            $table->string('small_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('featured_image');
            $table->dropColumn('featured_title');
            $table->dropColumn('small_image');
            $table->dropColumn('small_title');
        });
    }
}
