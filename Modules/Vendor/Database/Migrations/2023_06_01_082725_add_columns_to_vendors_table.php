<?php

use App\Enums\Table;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Table::VENDORS, function (Blueprint $table) {
            $table->time('opening_time');
            $table->time('closing_time');
            $table->text('bank_info')->nullable();
            $table->text('shop_photo')->nullable();
            $table->string('vendor_ref')->nullable();
            $table->boolean('delivery')->default(false);
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
