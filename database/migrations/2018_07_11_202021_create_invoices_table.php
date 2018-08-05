<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('domain_id')->unsigned();
            $table->char('type_payment',1);
            $table->date('date_payment');
            $table->date('date_pay')->nullable();
            $table->decimal('amount');
            $table->char('frequency', 1);
            $table->char('day_invoice', 2);
            $table->date('first_data_invoice');
            $table->decimal('first_amount_invoice');
            $table->decimal('amount_invoice');
            $table->char('pay', '1');
            $table->foreign('domain_id')->references('id')->on('domains');
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
        Schema::dropIfExists('invoices');
    }
}
