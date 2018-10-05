<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableForAddproduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('p_name');
            $table->string('p_discription')->lenght(1000);
            $table->string('p_d_discription')->lenght(10000);
            $table->string('p_price');
            $table->string('p_logo');
            $table->string('exam_url');
            $table->integer('admin_id')->index();
            $table->string('is_deleted')->default('no');
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
        Schema::dropIfExists('add_products');
    }
}
