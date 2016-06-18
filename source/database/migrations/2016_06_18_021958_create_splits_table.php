<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSplitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('splits', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->text('memo')->default('');
            $table->timestamp('reconciled_at')->nullable();
            $table->enum('type', ['credit', 'debit']);

            $table->unsignedInteger('account_id');
            $table->foreign('account_id')->references('id')->on('accounts');

            $table->unsignedInteger('transaction_id');
            $table->foreign('transaction_id')->references('id')->on('transactions');

            $table->index(['type', 'reconciled_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('splits');
    }
}
