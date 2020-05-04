<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('name', 50);
            $table->integer('price');
            $table->string('photo', 100);
            $table->integer('quantity');
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->timestamps();

            $table->foreign('brand_id')
                ->on('brands')
                ->references('id')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->on('categories')
                ->references('id')
                ->onDelete('cascade');
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
}
