<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\Table;

class CreateRecyclebinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Table::RECYCLE_BIN, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('related_row_id')->unsigned();
            $table->string('module');
            $table->string('eloquent');
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
        Schema::dropIfExists(Table::RECYCLE_BIN);
    }
}
