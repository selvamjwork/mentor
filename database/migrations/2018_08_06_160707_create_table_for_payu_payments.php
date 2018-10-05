<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableForPayuPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mihpayid');
            $table->string('mode')->nullable();
            $table->string('status')->nullable();
            $table->string('unmappedstatus');
            $table->string('key');
            $table->string('txnid');
            $table->double('amount');
            $table->string('cardCategory');
            $table->double('discount')->default(0);
            $table->double('net_amount_debit')->default(0);
            $table->string('addedon');
            $table->string('productinfo');
            $table->string('firstname');
            $table->string('email');
            $table->string('phone');
            $table->string('hash')->nullable();
            $table->string('payment_source')->nullable();
            $table->string('PG_TYPE')->nullable();
            $table->string('bank_ref_num')->nullable();
            $table->string('bankcode')->nullable();
            $table->string('error')->nullable();
            $table->string('error_Message')->nullable();
            $table->string('name_on_card')->nullable();
            $table->string('cardnum')->nullable();
            $table->string('cardhash')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('payu_payments');
    }
}
