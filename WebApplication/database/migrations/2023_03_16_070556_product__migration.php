<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained("users","id");
            $table->string('product_name');
            $table->integer('product_price');
            $table->foreignId('types_id')->constrained("types","id");
            $table->foreignId('car_typeId')->constrained("carTypes","id");
            $table->string('product_img');
            $table->string('product_description',150);
            $table->string('product_location', 120);
            $table->boolean('product_enable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};