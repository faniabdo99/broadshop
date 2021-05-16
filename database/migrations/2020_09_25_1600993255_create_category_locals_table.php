<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryLocalsTable extends Migration
{
    public function up()
    {
        Schema::create('category_locals', function (Blueprint $table) {
      		$table->id();
      		$table->string('lang_code');
      		$table->string('title_value');
      		$table->text('description_value')->nullable();
      		$table->integer('category_id');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_locals');
    }
}
