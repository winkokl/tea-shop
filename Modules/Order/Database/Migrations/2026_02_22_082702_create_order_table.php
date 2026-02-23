<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->string('order_number')->unique();
            $table->integer('table_id')->unsigned();
            $table->foreign('table_id')->references('id')->on('shoptable');

            $table->decimal('total_amount', 10, 2);
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->decimal('final_amount', 10, 2);
            $table->enum('payment_method', ['cash', 'kbzpay', 'wavepay', 'card'])
                  ->default('cash');
            $table->enum('payment_status', ['pending', 'paid', 'cancelled'])
                  ->default('pending');
            $table->enum('order_status', ['pending', 'preparing', 'completed', 'cancelled'])
                  ->default('pending');
            $table->dateTime('ordered_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
