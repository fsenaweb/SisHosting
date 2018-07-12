<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->string('domain')->unique();
            $table->integer('plan_id')->unsigned();
            $table->char('payment',1);
            $table->char('frequency', 1);
            $table->char('day_invoice', 2);
            $table->date('first_data_invoice');
            $table->decimal('first_amount_invoice');
            $table->decimal('amount_invoice');
            $table->text('information')->nullable();
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('domains');
    }
}
