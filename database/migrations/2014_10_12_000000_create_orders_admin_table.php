<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createorders_adminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_admin', function (Blueprint $table) {
            $table->id();
            $table->integer('order_user_id');
            $table->string('order');
            $table->string('order_price');
            $table->string('cep');
            $table->string('bairro');
            $table->string('rua');
            $table->string('numero');
            $table->string('complemento');
            $table->string('referencia');
            $table->string('status');
            $table->string('forma_entrega');
            $table->rememberToken();
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
        Schema::dropIfExists('orders_admin');
    }
}
