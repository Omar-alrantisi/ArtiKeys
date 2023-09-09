<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditSubscriberRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriber_ratings', function (Blueprint $table) {
            $table->decimal('mark_test_2')->default(0)->change();
            $table->decimal('mark_test_3')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usubscriber_ratings', function (Blueprint $table) {
            //
        });
    }
}
