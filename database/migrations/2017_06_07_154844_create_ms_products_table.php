<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('ms_sku');
            $table->string('ms_uuid');
            $table->string('ms_type');
            $table->string('ms_externalCode');
            $table->integer('ms_quantity');
            $table->float('ms_salePrice');
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
        Schema::dropIfExists('ms_products');
    }
}
