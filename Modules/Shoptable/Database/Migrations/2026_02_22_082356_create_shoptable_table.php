<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoptableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoptable', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->string('table_number'); // e.g. T1, T2, A1
            $table->integer('capacity')->default(4); // number of seats
            $table->enum('status', ['available', 'occupied', 'reserved'])
                  ->default('available');

            $table->unique(['shop_id', 'table_number']); // prevent duplicate table numbers per shop
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
        Schema::dropIfExists('shoptable');
    }
}
