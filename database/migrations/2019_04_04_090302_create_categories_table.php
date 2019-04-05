<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('name_fa');
            $table->string('image');
            $table->string('image_thumb');
            $table->text('description');
            $table->text('description_fa');
            $table->tinyInteger('sort_order');
            $table->boolean('status');
            $table->string('meta_title');
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->nestedSet();
            $table->boolean('feature');
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
        Schema::dropIfExists('categories', function(Blueprint $table){
            $table->dropNestedSet();

        });
    }
}
