<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agent_login_id')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('opening_balance')->default(0);
            $table->enum('click_side',['left','right'])->default('left');
            $table->string('limit')->nullable();
            $table->string('min_bet')->default(1);
            $table->string('phone_no')->nullable();
            $table->string('city')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->boolean('is_block')->default(0);
            $table->string('ip_address')->nullable();
            $table->string('delete_time')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('agents');
    }
}
