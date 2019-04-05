<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryFaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_faq', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_name');
            $table->string('category_name_fa');
            $table->string('category_image');
            $table->string('category_description');
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')
                ->references('id')
                ->on('category_faq')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->tinyInteger('sort_order');
            $table->boolean('status')->default(false);
            $table->string('meta_title');
            $table->string('meta_keywords');
            $table->string('meta_description');
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
        Schema::dropIfExists('category_faq', function(Blueprint $table){

            $table->dropForeign('category_faq_parent_id_foreign');

        });
    }
}
