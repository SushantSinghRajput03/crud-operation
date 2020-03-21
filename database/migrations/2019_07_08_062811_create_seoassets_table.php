<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoassetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seoassets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('entry');
            $table->string('website');
            $table->string('user_email');
            $table->string('user_name');
            $table->string('password');
            $table->string('link');
            $table->string('engineer_name');
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
        Schema::dropIfExists('seoassets');
    }
}
