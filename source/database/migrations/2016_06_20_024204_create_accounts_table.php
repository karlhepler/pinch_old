<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->timestamps();

            $table->string('name')->index();
            $table->enum('type', array_keys(config('budget.account_types')))->index();
            
            $table->unsignedInteger('balance')->default(0);
            $table->unsignedInteger('normal_balance')->default(0);
            $table->unsignedInteger('negative_balance')->default(0);

            $table->unsignedInteger('offset_account_id')->nullable();
            $table->foreign('offset_account_id')->references('id')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accounts');
    }
}
