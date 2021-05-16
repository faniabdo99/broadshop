<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration
{
    public function up()
    {
        Schema::create('product__images', function (Blueprint $table) {

		$table->id();
		$table->string('image');
		$table->integer('product_id');
    $table->timestamps();


        });
    }

    public function down()
    {
        Schema::dropIfExists('product__images');
    }
}
