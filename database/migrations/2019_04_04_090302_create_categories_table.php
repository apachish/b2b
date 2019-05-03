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
            $table->string('friendlyUrl')->nullable();
            $table->string('image')->nullable()->default('noImage.png');
            $table->text('description')->nullable();
            $table->text('description_fa')->nullable();
            $table->tinyInteger('sort_order')->nullable();
            $table->boolean('status')->default(false);
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->nestedSet();
            $table->boolean('feature')->default(false);
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
