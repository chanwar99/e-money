<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->string('account_number', 10)->primary();
            $table->string('fullname')->nullable();
            $table->text('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->double('balance');
            $table->string('pin_number')->nullable();
            $table->foreignUuid('user_id')->references('id')->on('users');
            $table->double('transfer_limit');
            $table->double('top_up_limit');
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
        Schema::dropIfExists('accounts');
    }
}