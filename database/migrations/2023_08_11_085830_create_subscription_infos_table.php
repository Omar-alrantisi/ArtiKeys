<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade');
            $table->string('education_level')->nullable();
            $table->string('field_of_study')->nullable();
            $table->string('education_background')->nullable();
            $table->string('arabic_writing')->nullable();
            $table->string('arabic_specking')->nullable();
            $table->string('english_writing')->nullable();
            $table->string('english_specking')->nullable();
            $table->string('hear_about')->nullable();
            $table->string('r_f_n_1')->nullable();
            $table->string('r_f_n_2')->nullable();
            $table->string('r_r_1')->nullable();
            $table->string('r_r_2')->nullable();
            $table->string('r_m_n_1')->nullable();
            $table->string('r_m_n_2')->nullable();
            $table->text('full_address')->nullable();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by_id');
            $table->unsignedBigInteger('updated_by_id');
            $table->foreign('created_by_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('updated_by_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('subscription_infos');
    }
}
