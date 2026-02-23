<?php

use App\Enums\Table;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Table::VENDORS, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('mobile')->unique();
            $table->string('nrc')->nullable();
            $table->text('address');
            $table->text('logo');
            $table->unsignedInteger('region_id');
            $table->foreign('region_id')->references('id')->on(Table::REGION);
            $table->unsignedInteger('township_id');
            $table->foreign('township_id')->references('id')->on(Table::TOWNSHIP);
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
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
        Schema::dropIfExists(Table::VENDORS);
    }
}
