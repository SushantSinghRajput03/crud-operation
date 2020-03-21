<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileAssetsTable extends Migration
{
    /**
     * Run the migrations.Mobiler | Carrier | Owner |  Status | Last Used | Last Recharge | State |
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mobiler');
            $table->string('carrier');
            $table->string('owner');
            $table->string('status');
            $table->string('last_used');
            $table->string('last_recharge');
            $table->string('state');
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
        Schema::dropIfExists('mobile_assets');
    }
}
