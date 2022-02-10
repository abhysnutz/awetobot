<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bots', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('paircode')->nullable();
            $table->string('authcode')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('firmware')->nullable();
            $table->enum('status', ['PENDING APPROVAL','PAIRING APPROVED','APPROVED','CONNECTED'])->default('PENDING APPROVAL');
            $table->string('public_ip')->nullable();
            $table->string('internal_ip')->nullable();
            $table->string('port')->nullable();
            $table->timestamp('last_seen_at')->nullable();
            $table->timestamp('last_action_at')->nullable();
            $table->integer('site_id')->nullable();
            $table->string('site_name')->nullable();
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
        Schema::dropIfExists('bots');
    }
}
